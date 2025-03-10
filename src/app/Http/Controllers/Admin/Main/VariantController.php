<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    private $PATH = 'main.variants';
    private $TITLE = ['Варианты', 'варианта'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Variant::query()->paginate(10);

        if ($request->search)
            $objects = Variant::query()
                ->where("text", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->orWhere(['number' => $request->search])
                ->paginate(10);

        if ($id = $request->delete) {
            $item = Variant::find($id);
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

        $object = $id ? Variant::find($id) : new Variant();

        if (!empty($request->object_id))
            $object = Variant::query()->find($request->object_id);

        if ($request->isMethod('post')) {
            $object->fill($request->only(['text', 'number']));

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
