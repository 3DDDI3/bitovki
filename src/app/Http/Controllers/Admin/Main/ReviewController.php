<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private $PATH = 'main.reviews';
    private $TITLE = ['Отзывы', 'отзыва'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Review::query()->paginate(10);

        if ($request->search)
            $objects = Review::query()
                ->where(['id' => $request->search])
                ->paginate(10);

        if ($id = $request->delete) {
            $item = Review::find($id);
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

        $object = $id ? Review::find($id) : new Review();

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
