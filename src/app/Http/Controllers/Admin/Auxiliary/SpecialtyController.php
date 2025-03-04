<?php

namespace App\Http\Controllers\Admin\Auxiliary;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    private $PATH = 'auxiliary.specialties';
    private $TITLE = ['Должности', 'должности'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Specialty::query()->paginate(10);

        if ($request->search)
            $objects = Specialty::query()
                ->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->paginate(10);

        if ($id = $request->delete) {
            $item = Specialty::find($id);
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

        $object = $id ? Specialty::find($id) : new Specialty();

        if ($request->isMethod('post')) {
            $object->fill($request->only(['name']));

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
        ));
    }
}
