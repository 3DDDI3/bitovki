<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    private $PATH = 'main.informations';
    private $TITLE = ['Пункты "как купить"', 'пункта'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Information::query()->paginate(10);

        if ($request->search)
            $objects = Information::query()
                ->where("text", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->orWhere(["number" => $request->search])
                ->paginate(10);

        if ($id = $request->delete) {
            $item = Information::find($id);
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

        $object = $id ? Information::find($id) : new Information();

        if ($request->isMethod('post')) {
            $object->fill($request->only(['number', 'text']));

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
