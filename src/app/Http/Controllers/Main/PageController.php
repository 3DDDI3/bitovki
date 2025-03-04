<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CardItem;
use App\Models\Company;
use App\Models\CompanyAddress;
use App\Models\CompanyContact;
use App\Models\Constructor\Block;
use App\Models\Constructor\BlockMenu;
use App\Models\Constructor\BlockType;
use App\Models\Constructor\Page;
use App\Models\Constructor\Person;
use App\Models\MainPage;
use App\Models\User\AdminEventLogs;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public $PATH = 'main.pages';
    public $TITLE = ['Страницы', 'страницы'];

    public function index(Request $request)
    {

        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Page::orderBy('rating', 'desc')->orderBy('id', 'desc')->get();

        if ($request->search) {
            $objects = Page::where("name", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")->get();
        }

        if ($id = $request->delete) {
            $item = Page::find($id);
            $item->delete();
            AdminEventLogs::log($item, $id);
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.' . $path . '.index', compact('objects', 'path', 'title'));
    }

    public function edit(Request $request, $id = null)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $object = $id ? Page::find($id) : new Page();

        $blockTypes = BlockType::all(['id', 'type', 'short_name']);

        $company = Company::query()->find(1);
        $companyContact = CompanyContact::all();
        $companyAddress = CompanyAddress::query()->find(1);

        $mainPage = MainPage::query()->find(1);

        $personal = Person::query()->orderBy('name')->get();

        $infografika = MainPage::query()->find(1);

        $pages = Page::orderBy('rating', 'desc')->get();

        if ($request->isMethod('post')) {
            switch ($object->id) {
                case 1:
                    MainPage::query()
                        ->find(1)
                        ->fill($request->only([
                            'title_1',
                            'text_1',
                            'title_2',
                            "text_2",
                            "title_3",
                            "text_3",
                            "video"
                        ]))
                        ->save();

                    foreach ($request->input() as $key => $value) {
                        if (preg_match("/(?:card_(item)|card_(title))_(\d+)/", $key,  $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }


                            switch ($matches[1]) {
                                case 'item':
                                    CardItem::query()
                                        ->find($matches[2])
                                        ->fill(['text' => $value])
                                        ->save();
                                    break;

                                case 'title':
                                    $object->cards->find($matches[2])->fill([$matches[1] => $value]);
                                    break;
                            }

                            $object->cards->find($matches[2])?->save();
                        }
                    }
                    break;
                case 2:
                    foreach ($request->input() as $key => $value) {
                        if (preg_match("/phone_description(\d+)/", $key, $matches)) {
                            $companyContact = CompanyContact::query()->find($matches[1]);
                            $companyContact->fill(['phone_description' => $value])->save();
                        }
                        if (preg_match("/phone(\d+)/", $key, $matches)) {
                            $companyContact = CompanyContact::query()->find($matches[1]);
                            $companyContact->fill(['phone' => $value])->save();
                        }
                        if (preg_match("/name(\d+)/", $key, $matches)) {
                            $companyContact = CompanyContact::query()->find($matches[1]);
                            $companyContact->fill(['name' => $value])->save();
                        }
                        if (preg_match("/email(\d+)/", $key, $matches)) {
                            $companyContact = CompanyContact::query()->find($matches[1]);
                            $companyContact->fill(['email' => $value])->save();
                        }
                    }

                    $companyAddress->fill($request->only([
                        'title',
                        'address',
                        'auto_text',
                        'bus_text',
                        'subtitle'
                    ]))->save();
                    $company->fill($request->only(['inn', 'kpp', 'ogrn', 'okpo']))->save();

                    break;

                case 3:
                    /**
                     * Обработка данных страницы "О нас"
                     */
                    foreach ($request->input() as $key => $value) {
                        if (preg_match("/description_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/text_image_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/(?:(comment)|(comment_name))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = Block::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'comment':
                                    $block->fill(['text' => $value]);
                                    break;
                                case 'comment_name':
                                    $block->fill(['name' => $value]);
                                    break;
                            }
                            $block->save();
                        }

                        if (preg_match("/(?:(menu_url)|(menu_title))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = BlockMenu::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'menu_title':
                                    $block->fill(['title' => $value]);
                                    break;
                                case 'menu_url':
                                    $block->fill(['url' => $value]);
                                    break;
                            }
                            $block->save();
                        }
                    }
                    break;

                case 4:
                    /**
                     * Обработка данных страницы "О нас"
                     */
                    foreach ($request->input() as $key => $value) {
                        if (preg_match("/description_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/text_image_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/(?:(comment)|(comment_name))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = Block::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'comment':
                                    $block->fill(['text' => $value]);
                                    break;
                                case 'comment_name':
                                    $block->fill(['name' => $value]);
                                    break;
                            }
                            $block->save();
                        }

                        if (preg_match("/(?:(menu_url)|(menu_title))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = BlockMenu::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'menu_title':
                                    $block->fill(['title' => $value]);
                                    break;
                                case 'menu_url':
                                    $block->fill(['url' => $value]);
                                    break;
                            }
                            $block->save();
                        }
                    }
                    break;

                case 5:
                    /**
                     * Обработка данных страницы "О нас"
                     */
                    foreach ($request->input() as $key => $value) {
                        if (preg_match("/description_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/text_image_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/(?:(comment)|(comment_name))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = Block::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'comment':
                                    $block->fill(['text' => $value]);
                                    break;
                                case 'comment_name':
                                    $block->fill(['name' => $value]);
                                    break;
                            }
                            $block->save();
                        }

                        if (preg_match("/(?:(menu_url)|(menu_title))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = BlockMenu::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'menu_title':
                                    $block->fill(['title' => $value]);
                                    break;
                                case 'menu_url':
                                    $block->fill(['url' => $value]);
                                    break;
                            }
                            $block->save();
                        }
                    }
                    break;

                case 6:
                    /**
                     * Обработка данных страницы "О нас"
                     */
                    foreach ($request->input() as $key => $value) {
                        if (preg_match("/description_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/text_image_(\d+)/", $key, $matches)) {
                            Block::query()
                                ->find($matches[1])
                                ->fill(['text' => $value])
                                ->save();
                        }

                        if (preg_match("/(?:(comment)|(comment_name))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = Block::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'comment':
                                    $block->fill(['text' => $value]);
                                    break;
                                case 'comment_name':
                                    $block->fill(['name' => $value]);
                                    break;
                            }
                            $block->save();
                        }

                        if (preg_match("/(?:(menu_url)|(menu_title))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            $block = BlockMenu::query()->find($matches[2]);

                            switch ($matches[1]) {
                                case 'menu_title':
                                    $block->fill(['title' => $value]);
                                    break;
                                case 'menu_url':
                                    $block->fill(['url' => $value]);
                                    break;
                            }
                            $block->save();
                        }
                    }
                    break;

                case 9:
                    foreach ($request->input() as $key => $value) {
                        if (preg_match("/(?:(background-image)|(description))_(\d+)/", $key, $matches)) {
                            for ($i = 0; $i < count($matches); $i++) {
                                if (empty($matches[$i])) array_splice($matches, $i, 1);
                            }

                            Block::query()
                                ->find($matches[2])
                                ->fill(['text' => $value])
                                ->save();
                        }
                    }

                    break;
            }

            $object ?? $object = new Page();

            $object->fill(
                $request->only(
                    [
                        'name',
                    ]
                )
            );

            if (empty($object->id) || $object->id > 1)
                $object->url = !empty($request->input('url')) ? $request->input('url') : "/pages/" . Str::slug($request->input('name'));

            // if ($request->file('galary') != null && !empty($object))
            //     FileUpload::uploadGallery('galary', $object->id, "about", path: "/images/tours/gallary", request: $request);

            $object->save();


            // if ($request->file('attached_files') != null) {

            //     FileUpload::uploadFile('attached_files', Document::class, 'url', $object->id, '/storage/files/');
            // }

            // AdminEventLogs::log($object, $id);

            return redirect()->route(
                'admin.' . $this->PATH . '.edit',
                ['id' => $object->id]
            )->with('message', 'Сохранено');
        }

        return view('admin.modules.' . $this->PATH . '.edit', compact(
            'object',
            'path',
            'title',
            'blockTypes',
            'company',
            'companyAddress',
            'companyContact',
            'personal',
            'infografika',
            'mainPage',
        ));
    }
}
