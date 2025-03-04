<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Constructor\Block;
use App\Models\Constructor\BlockFile;
use App\Models\Constructor\BlockImage;
use App\Models\Constructor\BlockMenu;
use App\Models\Medication;
use App\Models\MedicationFile;
use App\Models\MedicationPreview;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\NewsPreview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlockController extends Controller
{
    /**
     * Создание блока
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        switch ($request->id) {
            case 'medication-file':
                $blocks = collect();

                if (empty($request->block_id))
                    $medication = Medication::query()->create();

                foreach ($request->file() as $file) {
                    $path = $file->store('medication/files');

                    $medicationFile = MedicationFile::query()->create([
                        'medication_id' => $request->block_id ?? $medication->id,
                        'path' => $path,
                        'name' => $file->getClientOriginalName(),
                    ]);

                    $blocks->push((object)[
                        "id" => $medicationFile->id,
                        "object_id" => $request->block_id ?? $medication->id,
                        "name" => $medicationFile->name,
                        "path" => $medicationFile->path,
                    ]);
                }

                return response()->json(["blocks" => $blocks], 201);
                break;

            case 'preview-news-image':
                $path = $request->file()['file1']->store("news/files");

                if (empty($request->block_id)) {
                    $new_preview = NewsPreview::query()
                        ->create([
                            'path' => $path,
                            'name' => $request->file()['file1']->getClientOriginalName()
                        ]);
                    $new = News::query()
                        ->create(['news_preview_id' => $new_preview->id]);
                } else {
                    $new = News::query()->find($request->block_id);
                    $new_preview = NewsPreview::query()
                        ->create([
                            'path' => $path,
                            'name' => $request->file()['file1']->getClientOriginalName()
                        ]);
                    $new->fill(['news_preview_id' => $new_preview->id])
                        ->save();
                }

                if ($new->preview()->count() == 0)
                    $new_preview = $new->preview()->create([
                        'news_id' => $request->block_id ?? $new->id,
                        'path' => $path,
                        'name' => $request->file()['file1']->getClientOriginalName()
                    ]);
                else {
                    $new->preview->fill([
                        'news_id' => $request->block_id ?? $new->id,
                        'path' => $path,
                        'name' => $request->file()['file1']->getClientOriginalName()
                    ])->save();
                    $new_preview = $new->preview;
                }

                return response([
                    'id' => $new_preview->id,
                    'path' => $new_preview->path,
                    'object_id' => $new->id,
                    'name' => $new_preview->name
                ], 201);

                break;

                $path = $request->file()['file1']->store("medication/files");

                if (empty($request->block_id))
                    $medication = Medication::query()->create();
                else
                    $medication = Medication::query()->find($request->block_id);

                $medication_preview = MedicationPreview::query()->create([
                    'medication_id' => $request->block_id ?? $medication->id,
                    'path' => $path,
                    'name' => $request->file()['file1']->getClientOriginalName()
                ]);

                return response([
                    'id' => $medication_preview->id,
                    'path' => $medication_preview->path,
                    'object_id' => $medication->id,
                    'name' => $medication_preview->name
                ], 201);

                break;

            case 'editor_image':
                $path = $request->file()['file']->store("block/images");

                $block = BlockImage::query()
                    ->create([
                        'block_id' => $request->block_id,
                        'path' => $path,
                        'name' => $request->file()['file']->getClientOriginalName()
                    ]);

                return response($block->only(['block_id', 'id', 'path']), 201);

                break;

            default:

                if (empty($request->block_id)) {
                    $block = Block::query()
                        ->create([
                            "block_type_id" => $request->block_type_id,
                            "page_id" => $request->page_id,
                        ])
                        ->only(['id', 'block_type_id']);

                    if (empty($request->file()))
                        return response()->json(['blocks' => $block], 201);
                } else {
                    if (!empty($request->block_type_id)) {
                        $block = BlockMenu::query()
                            ->create(['block_id' => $request->block_id])
                            ->only(['id']);

                        return response()->json(['blocks' => $block], 201);
                    }

                    $block = Block::query()
                        ->where(["id" => $request->block_id])
                        ->first();
                }

                $blocks = collect();

                foreach ($request->file() as $file) {
                    $path = $file->store('blocks/files');
                    $blockFile = BlockFile::query()
                        ->create([
                            "block_id" => $block['id'],
                            "path" => $path,
                            "name" => $file->getClientOriginalName(),
                        ]);

                    $blocks->push((object)[
                        "id" => $blockFile->id,
                        "block_type_id" => $block['block_type_id'],
                        "block_id" => $block['id'],
                        "name" => $blockFile->name,
                        "path" => $blockFile->path,
                    ]);
                }

                return response()->json(["blocks" => $blocks], 201);
                break;
        }
    }

    /**
     * Удаление блока
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        switch ($request->id) {
            case 'medication-file':
                $medicationFile = MedicationFile::query()->find($request->block_file_id);
                Storage::delete($medicationFile->path);
                $medicationFile->delete();
                break;

            case 'editor_image':
                $blockImage = BlockImage::query()
                    ->where(['block_id' => $request->block_id, 'path' => preg_replace("/\/public\//", "", $request->src)])
                    ->first();

                Storage::delete($blockImage->path);
                $blockImage->delete();

                return response([], 200);

                break;

            default:
                if (empty($request->block_id)) {
                    $blockFile = BlockFile::query()
                        ->where(['id' => $request->block_file_id])
                        ->first();

                    if (!empty($blockFile)) {
                        Storage::delete($blockFile->path);
                        $blockFile->delete();
                    }
                } else {

                    if (!empty($request->block_type_id))
                        $block = BlockMenu::query()->find($request->block_id);
                    else {

                        $block = Block::query()
                            ->find($request->block_id);

                        foreach ($block->blockFiles as $blockFile) {
                            Storage::delete($blockFile->path);
                        }
                    }

                    $block->delete();
                }
                break;
        }

        return response([], 200);
    }

    public function changeSequence(Request $request) {}

    public function swap(Request $request)
    {
        foreach ($request->input() as $key => $value) {
            Block::query()
                ->find($key)
                ->fill(['rating' => (int)$value])
                ->save();
        }

        return response([], 200);
    }

    public function swapFiles(Request $request)
    {
        foreach ($request->input() as $key => $value) {
            BlockFile::query()
                ->find($key)
                ->fill(['rating' => $value])
                ->save();
        }

        return response([], 200);
    }
}
