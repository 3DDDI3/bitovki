<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\Item;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private $PATH = 'main.catalog';
    private $TITLE = ['Каталог', 'пункта'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Item::query()
            ->orderBy('rating', 'desc')
            ->paginate(10);

        if ($request->search)
            $objects = Item::query()
                ->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->paginate(10);

        if ($id = $request->delete) {
            $item = Item::find($id);
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

        $object = $id ? Item::find($id) : new Item();

        if (!empty($request->object_id))
            $object = Item::query()->find($request->object_id);

        if ($request->isMethod('post')) {
            $object->fill($request->only([
                'title',
                'subtitle',
                'old_price',
                'month_count'
            ]));

            $object->old_price = !empty($request->old_price) ? floatval(preg_replace("/\s/", "", $request->old_price)) : null;
            $object->new_price = !empty($request->new_price) ? floatval(preg_replace("/\s/", "", $request->new_price)) : null;
            $object->monthly_payment = !empty($request->monthly_payment) ? floatval(preg_replace("/\s/", "", $request->monthly_payment)) : null;

            if ($object->specs()->count() > 0) {
                $object->specs->fill([
                    'living_area' => !empty($request->living_area) ? floatval($request->living_area) : null,
                    'area' => !empty($request->area) ?  floatval($request->area) : null,
                    'building_area' => !empty($request->building_area) ?  floatval($request->building_area) : null,
                    'length' => !empty($request->length) ? floatval($request->length) : null,
                    'sizes' => $request->sizes,
                ])->save();
            } else {
                $object->specs()->create([
                    'living_area' => !empty($request->living_area) ? floatval($request->living_area) : null,
                    'area' => !empty($request->area) ?  floatval($request->area) : null,
                    'building_area' => !empty($request->building_area) ?  floatval($request->building_area) : null,
                    'length' => !empty($request->length) ? floatval($request->length) : null,
                    'sizes' => $request->sizes,
                ]);
            }

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
