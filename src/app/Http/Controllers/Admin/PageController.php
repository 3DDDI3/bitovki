<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use App\Models\Page\PageSection;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public $PATH = 'page';
    public $TITLE = ['Страницы', 'страницы'];
    public $MODEL = Page::class;

    public function index(Request $request)
    {
        $PATH = $this->PATH;
        $TITLE = $this->TITLE;

        $objects = $this->MODEL::orderBy('id', 'desc');

        if ($request->search) {
            $objects = $objects->where('title', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%');
        }

        if ($id = $request->delete) {
            $item = $this->MODEL::find($id);
            Reviews::where('item_type', 'pages')->where('item_id', $item->id)->delete();
            Storage::delete($item->banner);
            $item->delete();
            \App\Models\User\AdminEventLogs::log(false, $id);
            return redirect()->back()->with('message', 'Удалено');
        }

        $objects = $objects->get();


        return view('admin.modules.' . $PATH . '.index', compact('objects', 'PATH', 'TITLE'));
    }

    public function edit(Request $request, $id = null)
    {
        $PATH = $this->PATH;
        $TITLE = $this->TITLE;

        $object = $id ? $this->MODEL::find($id) : new $this->MODEL();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token', 'url']))->save();
            $object->url = $request->url ?? Str::slug($request->title);
            if (!isset($request->header_show))
                $object->header_show = 0;
            if (!isset($request->footer_show))
                $object->footer_show = 0;
            $object->save();
            FileUpload::uploadImage('banner', Page::class, 'banner', $object->id, 1920, 1280, '/images/pages/banners', false, $request);

            \App\Models\User\AdminEventLogs::log($object, $id);

            return redirect()->route('admin.' . $PATH . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        $sections = PageSection::all();

        return view('admin.modules.' . $PATH . '.edit', compact('object', 'sections', 'PATH', 'TITLE'));
    }

}