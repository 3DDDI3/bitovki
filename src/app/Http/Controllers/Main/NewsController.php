<?php

namespace App\Http\Controllers\Main;

use App\Filters\NewsFilter;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\View\Components\Template\Blocks\News as BlocksNews;
use App\View\Components\Template\Blocks\NewsAlt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $PATH = 'main.news';
    public $TITLE = ['Новости', 'новости'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = News::query()
            ->orderBy('rating', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($request->search) {
            $objects = News::query()
                ->whereHas('preview', function ($query) use ($request) {
                    $query->where("title", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%");
                })->paginate(10)
                ->withQueryString();
        }

        if ($id = $request->delete) {
            $item = News::find($id);
            $item->delete();
            // AdminEventLogs::log($item, $id);
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.' . $path . '.index', compact('objects', 'path', 'title'));
    }

    public function edit(Request $request, $id = null)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $object = $id ? News::find($id) : new News();

        if ($request->isMethod('post')) {
            try {
                $created_at = Carbon::createFromFormat('d.m.Y', $request->created_at);
            } catch (\Throwable $th) {
            }

            $object = !empty($request->object_id) ? News::query()->find($request->object_id) : new News();

            $object->fill([
                'text' => $request->text,
                'created_at' => !empty($created_at) ? $created_at : Carbon::now(),
                'main_news' => $request->main_news,
            ]);

            if (empty($object->preview)) {
                $preview_new = $object
                    ->preview()
                    ->create(['title' => $request->title, 'description' => $request->description]);

                $object->fill(['news_preview_id' => $preview_new->id])->save();
            } else $object
                ->preview
                ->fill(['description' => $request->description, 'title' => $request->title])
                ->save();

            //     if (empty($object->url) && !empty($object->title)) $object->url = str_slug($object->title);

            $object->save();

            //     if ($request->file('image') != null)
            //         FileUpload::uploadImage('image', News::class, 'image', $object->id, 1015, 432, '/images/news', request: $request);

            //     if ($request->file('preview_image') != null)
            //         FileUpload::uploadImage('preview_image', News::class, 'preview_image', $object->id, 359, 162, '/images/news', request: $request);

            //     AdminEventLogs::log($object, $id);

            return redirect()->route('admin.' . $this->PATH . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        return view('admin.modules.' . $this->PATH . '.edit', compact('object', 'path', 'title'));
    }

    public function getMore(Request $request, NewsFilter $filter)
    {
        $newsBlock = new BlocksNews();
        $newsAltBlock = new NewsAlt();

        if ($request->block == 0) {
            $news = News::filter($filter)
                ->whereNull('main_news')
                ->orderBy('created_at', 'desc')
                ->paginate(3);

            if ($news->count() == 0)
                return response('', 200);

            foreach ($news as $new) {
                $html[] = $newsBlock->render()->with([
                    'id' => $new->id,
                    'date' => $new->created_at->format('d.m.Y'),
                    'title' => $new->preview->title,
                    'description' => $new->preview->subtitle,
                    'image' => $new->preview->path,
                    'url' => "admin/main/news",
                    'user' => auth()->user(),
                ]);
            }
        } else {
            $altNews = News::filter($filter)
                ->whereNotNull('main_news')
                ->orderBy('created_at', 'desc')
                ->paginate(3);

            if ($altNews->count() == 0)
                return response('', 200);

            foreach ($altNews as $altNew) {
                $html[] = $newsAltBlock->render()->with([
                    'id' => $altNew->id,
                    'date' => $altNew->created_at->format('d.m.Y'),
                    'title' => $altNew->preview->title,
                    'image' => $altNew->preview->path,
                    'url' => "admin/main/news",
                    'user' => auth()->user()
                ]);
            }
        }

        if (empty($html))
            return response('', 200);

        $html = implode('', $html);

        return response($html);
    }
}
