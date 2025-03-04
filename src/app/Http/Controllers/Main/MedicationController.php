<?php

namespace App\Http\Controllers\Main;

use App\Filters\MedicationFilter;
use App\Http\Controllers\Controller;
use App\Models\Medication;
use App\Models\MedicationReseach;
use App\Models\MedicationTypes;
use App\View\Components\Template\Blocks\Medication as BlocksMedication;
use Faker\Provider\Medical;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class MedicationController extends Controller
{
    public $PATH = 'main.medication';
    public $TITLE = ['Препараты', 'препарата'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Medication::query()
            ->orderBy('rating', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($request->search) {
            $objects = Medication::query()->whereHas('preview', function ($query) use ($request) {
                $query->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%");
            })->paginate(10)->withQueryString();
        }

        if ($id = $request->delete) {
            $item = Medication::find($id);
            $item->delete();
            // AdminEventLogs::log($item, $id);
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.' . $path . '.index', compact(
            'objects',
            'path',
            'title',
        ));
    }

    public function edit(Request $request, $id = null)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $object = $id ? Medication::find($id) : new Medication();

        $medicationTypes = collect();

        foreach (MedicationTypes::query()->orderBy('type')->get() as $medicationType) {
            $medicationTypes->push((object)[
                "id" => $medicationType->id,
                "name" => $medicationType->title,
            ]);
        }

        $medicationTypes->prepend((object)[
            "id" => 0,
            "name" => "Не выбрано",
        ]);

        $medicationTypeHeader = $object->type->count() > 0 ? $object->type->first()->title : 0;

        if ($request->isMethod('post')) {

            $object = !empty($request->object_id) ? Medication::query()->find($request->object_id) : new Medication();

            $object->fill([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'instraction_short' => $request->instraction_short,
                'description' => $request->description,
                'instraction_short_descripion' => $request->instraction_short_descripion,
                'indications' => $request->indications,
                'researches_description' => $request->researches_description,
                'researches_title' => $request->researches_title,
                'patients_count' => (int)$request->patients_count,
                'volunteers_count' => (int)$request->volunteers_count,
                'subjects_count' => (int)$request->subjects_count,
                'patient_title' => $request->patient_title,
                'instraction_title' => $request->instraction_title,
                'phases_title' => $request->phases_title,
                'reseaches_title' => $request->reseaches_title,
                'phases_text' => $request->phases_text,
                'patients_count_title' => $request->patients_count_title,
            ]);

            $object->save();

            foreach ($request->input() as $key => $value) {
                if (preg_match("/research_(\d+)/", $key, $matches))
                    $object->researches->find($matches[1])
                        ->fill(['description' => $value])
                        ->save();
            }

            foreach ($request->input() as $key => $value) {
                if (preg_match("/(?:(reseaches_description|reseaches_phase))_(\d+)/", $key, $matches)) {
                    for ($i = 0; $i < count($matches); $i++) {
                        if (empty($matches[$i]))
                            array_splice($matches, $i, 1);
                    }

                    switch ($matches[1]) {
                        case 'reseaches_phase':
                            MedicationReseach::query()
                                ->find($matches[2])
                                ->fill(['phase' => $value])
                                ->save();
                            break;

                        case 'reseaches_description':
                            MedicationReseach::query()
                                ->find($matches[2])
                                ->fill(['description' => $value])
                                ->save();
                            break;
                    }
                }
            }

            $object->preview()->updateOrCreate(
                ['medication_id' => $object->id],
                ['title' => $request->preview_title, 'subtitle' => $request->preview_subtitle]
            );

            if ($request->medicationType > 0)
                $object->type()->sync([$request->medicationType]);
            else {
                $object->type()->detach();
            }

            foreach ($request->input() as $key => $value) {
                if (preg_match("/^(short_description|title|description|instraction_short|instraction_short_descripion|indications|volunteers_count|patients_count|subjects_count)_(\d+)$/", $key, $matches)) {
                    for ($i = 0; $i < count($matches); $i++) {
                        if (empty($matches[$i]))
                            array_splice($matches, $i, 1);
                    }

                    dd($matches);

                    Medication::query()
                        ->find($matches[2])
                        ->fill([$matches[1] = $value])
                        ->save();
                }
            }

            $existingModel = Medication::find(31);

            //     AdminEventLogs::log($object, $id);

            return redirect()->route('admin.' . $this->PATH . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        return view(
            'admin.modules.' . $this->PATH . '.edit',
            compact(
                'object',
                'path',
                'title',
                'medicationTypes',
                'medicationTypeHeader',
            )
        );
    }

    public function getMore(Request $request, MedicationFilter $filter)
    {
        $medications = Medication::filter($filter)
            ->orderBy('rating')
            ->paginate(8);

        $medicationBlock = new BlocksMedication(0);

        if ($medications->count() == 0)
            return response('', 200);

        foreach ($medications as $medication) {
            $block = $medicationBlock->render()->with([
                'id' => $medication->id,
                'title' => $medication->preview?->title,
                'subtitle' => $medication->preview?->subtitle,
                'image' => $medication->preview?->path,
            ]);
            $html[] = $block;
        }

        $html = implode('', $html);

        return response($html);
    }

    public function researchCreate(Request $request)
    {
        if (empty($request->medication_id))
            $medication = Medication::query()->create();
        else
            $medication = Medication::query()->find($request->medication_id);

        $medicationReseach = MedicationReseach::query()->create(['medication_id' => $medication->id]);

        $obj = collect();
        $obj->push((object)[
            "id" => $medicationReseach->id,
            "object_id" => $medication->id,
        ]);

        return response($obj, 201);
    }

    public function researchDelete(Request $request)
    {
        MedicationReseach::query()
            ->find($request->medication_id)
            ->delete();

        return response([], 200);
    }
}
