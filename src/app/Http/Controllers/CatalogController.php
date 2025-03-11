<?php

namespace App\Http\Controllers;

use App\Models\Main\Item;
use App\View\Components\CatalogItem;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::query()->orderBy('rating', 'desc')->paginate(5);

        $catalogItem = new CatalogItem();

        foreach ($items as $item) {
            $html[] = $catalogItem->render()->with(['item' => $item, 'class' => 'slider']);
        }

        if (empty($html))
            return response('', 200);

        $html = implode('', $html);

        return response($html);
    }

    public function getImage(Request $request)
    {
        $image = Item::query()->find($request->id)->image_path;

        return response(['path' => $image], 200);
    }
}
