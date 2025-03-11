<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\AdditionalOption;
use Illuminate\Http\Request;

class AdditionalOptionController extends Controller
{
    private $PATH = 'main.additional-options';
    private $TITLE = ['Дополнительные услуги', 'дополнительной услуги'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = AdditionalOption::query()->paginate(10);

        if ($request->search)
            $objects = AdditionalOption::query()
                ->where("text", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->orWhere(['id' => $request->search])
                ->paginate(10);

        if ($id = $request->delete) {
            $item = AdditionalOption::find($id);
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

        $object = $id ? AdditionalOption::find($id) : new AdditionalOption();

        if (!empty($request->object_id))
            $object = AdditionalOption::query()->find($request->object_id);

        if ($request->isMethod('post')) {
            $object->fill($request->only(['text']));

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
