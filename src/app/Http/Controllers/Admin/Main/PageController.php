<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $PATH = 'main.pages';
    private $TITLE = ['Страницы', 'должности'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Page::query()->get();

        // if ($request->search)
        //     $objects = Specialty::query()
        //         ->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
        //         ->paginate(10);

        // if ($id = $request->delete) {
        //     $item = Specialty::find($id);
        //     $item->delete();
        //     // AdminEventLogs::log($item, $id);
        //     return redirect()
        //         ->back()
        //         ->with('message', 'Удалено');
        // }

        return view('admin.modules.' . $path . '.index', compact('objects', 'path', 'title'));
    }

    public function edit(Request $request, $id = null)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $object = $id ? Page::find($id) : new Page();

        if (!empty($request->object_id))
            $object = Page::query()->find($request->object_id);

        if ($request->isMethod('post')) {
            $object->fill($request->only([
                'block_1_title',
                'block_1_subtitle',
                'block_1_price_title',
                'block_1_image_path',
                'block_1_price_subtitle',
                'block_2_title',
                'block_2_subtitle',
                'block_2_text1',
                'block_2_text2',
                'block_2_image_path',
                'block_2_image_description',
                'block_3_title',
                'block_3_title',
                'block_3_economy_title',
                'block_3_economy_value',
                'block_3_subtitle',
                'block_3_text',
                'block_3_image_path',
                'block_3_1_title',
                'block_3_1_economy_title',
                'block_3_1_economy_value',
                'block_3_1_subtitle',
                'block_3_1_text',
                'block_3_1_image_path',
                'block_4_title',
                'block_4_text',
                'block_4_image1_path',
                'block_4_image1_description',
                'block_4_image2_path',
                'block_4_image2_description'
            ]));

            $object->block_1_price_value = floatval(preg_replace("/\s/", "", $request->block_1_price_value));

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
