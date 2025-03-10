<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Main\AdditionalOption;
use App\Models\Main\Infographic;
use App\Models\Main\Item;
use App\Models\Main\ItemAttachedImage;
use App\Models\Main\OurWork;
use App\Models\Main\Page;
use App\Models\Main\Review;
use App\Models\Main\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function save(Request $request)
    {
        if (!empty($request->type))
            switch ($request->type) {
                case 'additional-option':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $additionalOption = AdditionalOption::query()->findOrNew($request->id);
                    $additionalOption->fill([
                        'image_path' => $path,
                        'image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $additionalOption->id, 'path' => $additionalOption->image_path], 201);
                    break;

                case 'variant':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $variant = Variant::query()->findOrNew($request->id);
                    $variant->fill([
                        'image_path' => $path,
                        'image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $variant->id, 'path' => $variant->image_path], 201);
                    break;

                case 'our-work':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $ourWork = OurWork::query()->findOrNew($request->id);
                    $ourWork->fill([
                        'image_path' => $path,
                        'image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $ourWork->id, 'path' => $ourWork->image_path], 201);
                    break;

                case 'review':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $review = Review::query()->findOrNew($request->id);
                    $review->fill([
                        'image_path' => $path,
                        'image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $review->id, 'path' => $review->image_path], 201);
                    break;

                case 'block_1_image':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $page = Page::query()->findOrNew($request->id);
                    $page->fill([
                        'block_1_image_path' => $path,
                        'block_1_image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $page->id, 'path' => $page->block_1_image_path], 201);
                    break;

                case 'block_2_image':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $page = Page::query()->findOrNew($request->id);
                    $page->fill([
                        'block_2_image_path' => $path,
                        'block_2_image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $page->id, 'path' => $page->block_2_image_path], 201);
                    break;

                case 'block_3_image1':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $page = Page::query()->findOrNew($request->id);
                    $page->fill([
                        'block_3_image_path' => $path,
                        'block_3_image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $page->id, 'path' => $page->block_3_image_path], 201);
                    break;

                case 'block_3_image2':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $page = Page::query()->findOrNew($request->id);
                    $page->fill([
                        'block_3_1_image_path' => $path,
                        'block_3_1_image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $page->id, 'path' => $page->block_3_1_image_path], 201);
                    break;

                case 'block_4_image1':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $page = Page::query()->findOrNew($request->id);
                    $page->fill([
                        'block_4_image1_path' => $path,
                        'block_4_image1_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $page->id, 'path' => $page->block_4_image1_path], 201);
                    break;

                case 'block_4_image2':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $page = Page::query()->findOrNew($request->id);
                    $page->fill([
                        'block_4_image2_path' => $path,
                        'block_4_image2_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $page->id, 'path' => $page->block_4_image2_path], 201);
                    break;

                case 'infographic':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $page = Infographic::query()->findOrNew($request->id);
                    $page->fill([
                        'image_path' => $path,
                        'image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $page->id, 'path' => $page->image_path], 201);
                    break;

                case 'catalog':
                    $file = $request->file()['file1'];
                    $path = $file->store('images');
                    $item = Item::query()->findOrNew($request->id);
                    $item->fill([
                        'image_path' => $path,
                        'image_name' => $file->getClientOriginalName()
                    ])->save();

                    return response(['id' => $item->id, 'path' => $item->image_path], 201);
                    break;
            }

        if (!empty($request->block_id)) {
            switch ($request->block_id) {
                case 'item_images':
                    $images = collect();

                    foreach ($request->file() as $file) {

                        if (!preg_match("/\d+/", $request->id)) {
                            $path = $file->store('images');

                            $item = Item::query()->create();
                            $image = $item->attachedImages()->create([
                                'image_path' => $path,
                                'image_name' => $file->getClientOriginalName(),
                            ]);
                        } else {
                            $path = $file->store('images');

                            $item =  Item::query()->find($request->id);

                            $image = $item->attachedImages()->create([
                                'image_path' => $path,
                                'image_name' => $file->getClientOriginalName(),
                            ]);
                        }

                        $images->push((object)[
                            "id" => $image->id,
                            "object_id" => $item->id,
                            "name" => $image->image_name,
                            "path" => $image->image_path,
                        ]);
                    }

                    return response()->json(["images" => $images], 201);
                    break;
            }
        }
    }

    public function delete(Request $request)
    {
        switch ($request->type) {
            case 'additional-option':
                $additionalOption = AdditionalOption::query()->find($request->id);
                Storage::delete($additionalOption->image_path);
                $additionalOption->fill(['image_path' => null, 'image_name' => null])->save();
                return response([], 200);
                break;

            case 'variant':
                $variant = Variant::query()->find($request->id);
                Storage::delete($variant->image_path);
                $variant->fill(['image_path' => null, 'image_name' => null])->save();
                return response([], 200);
                break;

            case 'our-work':
                $ourWork = OurWork::query()->find($request->id);
                Storage::delete($ourWork->image_path);
                $ourWork->fill(['image_path' => null, 'image_name' => null])->save();
                return response([], 200);
                break;

            case 'review':
                $review = Review::query()->find($request->id);
                Storage::delete($review->image_path);
                $review->fill(['image_path' => null, 'image_name' => null])->save();
                return response([], 200);
                break;

            case 'block_1_image':
                $page = Page::query()->find($request->id);
                Storage::delete($page->block_1_image_path);
                $page->fill(['block_1_image_path' => null, 'block_1_image_name' => null])->save();
                return response([], 200);
                break;

            case 'block_2_image':
                $page = Page::query()->find($request->id);
                Storage::delete($page->block_2_image_path);
                $page->fill(['block_2_image_path' => null, 'block_2_image_name' => null])->save();
                return response([], 200);
                break;

            case 'block_3_image':
                $page = Page::query()->find($request->id);
                Storage::delete($page->block_3_image_path);
                $page->fill(['block_3_image_path' => null, 'block_3_image_name' => null])->save();
                return response([], 200);
                break;

            case 'block_3_image1':
                $page = Page::query()->find($request->id);
                Storage::delete($page->block_3_1_image_path);
                $page->fill(['block_3_1_image_path' => null, 'block_3_1_image_name' => null])->save();
                return response([], 200);
                break;

            case 'block_4_image1':
                $page = Page::query()->find($request->id);
                Storage::delete($page->block_4_image1_path);
                $page->fill(['block_4_image1_path' => null, 'block_4_image1_name' => null])->save();
                return response([], 200);
                break;

            case 'block_4_image2':
                $page = Page::query()->find($request->id);
                Storage::delete($page->block_4_image2_path);
                $page->fill(['block_4_image2_path' => null, 'block_4_image2_name' => null])->save();
                return response([], 200);
                break;

            case 'infographic':
                $page = Infographic::query()->find($request->id);
                Storage::delete($page->image_path);
                $page->fill(['image_path' => null, 'image_name' => null])->save();
                return response([], 200);
                break;

            case 'catalog':
                $page = Item::query()->find($request->id);
                Storage::delete($page->image_path);
                $page->fill(['image_path' => null, 'image_name' => null])->save();
                return response([], 200);
                break;
        }

        if (!empty($request->image_id) && empty($request->id)) {
            $image = Item::query()
                ->find($request->id)
                ->attachedImages()
                ->where(['id' => $request->image_id])
                ->first();

            Storage::delete($image->image_path);
            $image->delete();
            return response([], 200);
        }

        if (!empty($request->id)) {
            $image = ItemAttachedImage::query()->find($request->image_id);
            Storage::delete($image->image_path);
            $image->delete();
            return response([], 200);
        }
    }
}
