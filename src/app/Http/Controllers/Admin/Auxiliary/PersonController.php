<?php

namespace App\Http\Controllers\Admin\Auxiliary;

use App\Http\Controllers\Controller;
use App\Models\Constructor\Person;
use App\Models\Specialty;
use App\Models\User\AdminEventLogs;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public $PATH = 'auxiliary.staff';
    public $TITLE = ['Сотрудники', 'сотрудника'];

    public function index(Request $request)
    {

        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Person::query()
            ->orderBy('rating', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($request->search)
            $objects = Person::query()
                ->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->orderBy('id', 'desc')
                ->paginate(10);

        if ($id = $request->delete) {
            $item = Person::find($id);
            $item->delete();
            // AdminEventLogs::log($item, $id);
            return redirect()
                ->back()
                ->with('message', 'Удалено');
        }

        return view('admin.modules.' . $path . '.index', compact('objects', 'path', 'title'));
    }

    public function edit(Request $request, $id = null)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $object = $id ? Person::find($id) : new Person();

        $specialties = collect([(object)["id" => 0, "name" => "Выберите должность"]]);

        $specialty_head = $object->specialty->name ?? 0;

        foreach (Specialty::query()->orderBy('name')->get() as $specialty) {
            $specialties->push((object)[
                "id" => $specialty->id,
                "name" => $specialty->name,
            ]);
        }

        if ($request->isMethod('post')) {

            $object = !empty($request->object_id) ? Person::query()->find($request->object_id) : new Person();

            $object->fill($request->only(['name']));

            if ($request->specialty > 0)
                $object->specialty_id = $request->specialty;

            $object->save();

            // AdminEventLogs::log($object, $id);

            return redirect()
                ->route(
                    'admin.' . $this->PATH . '.edit',
                    ['id' => $object->id]
                )->with('message', 'Сохранено');
        }

        return view('admin.modules.' . $this->PATH . '.edit', compact(
            'object',
            'path',
            'title',
            'specialties',
            'specialty_head'
        ));
    }
}
