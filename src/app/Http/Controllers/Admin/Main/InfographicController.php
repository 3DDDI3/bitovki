<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\Infographic;
use Illuminate\Http\Request;

class InfographicController extends Controller
{
    private $PATH = 'main.infographics';
    private $TITLE = ['Инфографика', 'инфографики'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Infographic::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($request->search)
            $objects = Infographic::query()
                ->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->paginate(10);

        if ($id = $request->delete) {
            $item = Infographic::find($id);
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

        $object = $id ? Infographic::find($id) : new Infographic();

        if (!empty($request->object_id))
            $object = Infographic::query()->find($request->object_id);

        if ($request->isMethod('post')) {
            $object->fill($request->only(['title']));

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
