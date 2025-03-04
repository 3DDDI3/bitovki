<?php

namespace App\Http\Controllers;

use App\Models\CardItem;
use App\Models\MainPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainPageController extends Controller
{
    public function create(Request $request)
    {
        $cardItem = CardItem::query()->create(['card_id' => $request->id]);

        return response($cardItem, 201);
    }

    public function delete(Request $request)
    {
        CardItem::query()->find($request->id)->delete();

        return response([], 200);
    }

    public function videoAttach(Request $request)
    {
        $path = $request->file()['video']->store('video');
        $mainPage = MainPage::query()->find(1);
        $mainPage->fill(['video' => $path])->save();

        return response($mainPage->only(['video']), 201);
    }

    public function videoDetach()
    {
        $mainPage = MainPage::query()->find(1);
        Storage::delete($mainPage->video);
        $mainPage->fill(['video' => null])->save();

        return response($mainPage, 200);
    }
}
