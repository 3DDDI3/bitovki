<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\OurWork;
use Illuminate\Http\Request;

class OurWorkController extends Controller
{
    private $PATH = 'main.our-works';
    private $TITLE = ['Наши работы', 'работы'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = OurWork::query()
            ->orderBy('rating', 'desc')
            ->paginate(10);

        // if ($request->search)
        //     $objects = OurWork::query()
        //         ->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
        //         ->paginate(10);

        if ($id = $request->delete) {
            $item = OurWork::find($id);
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

        $object = $id ? OurWork::find($id) : new OurWork();

        // if ($request->isMethod('post')) {
        //     $object->fill($request->only(['name']));

        //     $object->save();

        //     // AdminEventLogs::log($object, $id);

        //     return redirect()
        //         ->route(
        //             'admin.' . $this->PATH . '.edit',
        //             ['id' => $object->id]
        //         )->with('message', 'Сохранено');
        // }

        return view('admin.modules.' . $this->PATH . '.edit', compact(
            'object',
            'path',
            'title',
        ));
    }
}
