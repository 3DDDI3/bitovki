<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Company;
use App\Models\CompanyAddress;
use App\Models\Constructor\Block;
use App\Models\Constructor\Person;
use App\Models\Medication;
use App\Models\MedicationFile;
use App\Models\MedicationPreview;
use App\Models\MedicationTypes;
use App\Models\News;
use App\Models\NewsPreview;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function save(Request $request)
    {
        if (!empty($request->type))
            switch ($request->type) {
                case 'person':
                    $file = $request->file()['file1'];
                    $path = $file->store('blocks/persons');
                    $person = Person::query()->findOrNew($request->id);
                    $person->fill(['path' => $path])
                        ->save();
                    return response(['id' => $person->id, 'path' => $person->path], 201);
                    break;

                case 'requisites':
                    $path = $request->file()['file1']->store('company/files');
                    $company = Company::query()
                        ->where(['id' => 1])
                        ->first();

                    if (!$company)
                        $company = Company::query()->create([
                            'requisites_path' => $path,
                            'requisites_name' => $request->file()['file1']->getClientOriginalName()
                        ]);
                    else $company->fill([
                        'requisites_path' => $path,
                        'requisites_name' => $request->file()['file1']->getClientOriginalName()
                    ])->save();

                    return response([
                        'id' => $company->id,
                        'name' => $company->requisites_name,
                        'path' => $company->requisites_path
                    ], 201);

                    break;

                case "map-image":
                    $path = $request->file()['file1']->store('company/files');
                    $companyAddress = CompanyAddress::query()
                        ->where(['id' => 1])
                        ->first();

                    if (!$companyAddress)
                        $companyAddress = CompanyAddress::query()->create([
                            'photo_path' => $path,
                            'photo_name' => $request->file()['file1']->getClientOriginalName(),
                        ]);
                    else {
                        $companyAddress->fill([
                            'photo_path' => $path,
                            'photo_name' => $request->file()['file1']->getClientOriginalName(),
                        ])->save();
                    }

                    return response([
                        'id' => $companyAddress->id,
                        'name' => $companyAddress->photo_name,
                        'path' => $companyAddress->photo_path
                    ], 201);

                    break;

                case "map-schema":
                    $path = $request->file()['file1']->store('company/files');
                    $companyAddress = CompanyAddress::query()->where(['id' => 1])->first();

                    if (!$companyAddress)
                        $companyAddress = CompanyAddress::query()->create([
                            'schema_path' => $path,
                            'schema_name' => $request->file()['file1']->getClientOriginalName(),
                        ]);
                    else $companyAddress->fill([
                        'schema_path' => $path,
                        'schema_name' => $request->file()['file1']->getClientOriginalName(),
                    ])->save();

                    return response([
                        'id' => $companyAddress->id,
                        'name' => $companyAddress->schema_name,
                        'path' => $companyAddress->schema_path
                    ], 201);

                    break;

                case "medication-types":
                    $path = $request->file()['file1']->store('medication/files');
                    $medicationTypes = MedicationTypes::query()->where(['id' => $request->id])->first();

                    if (!$medicationTypes)
                        $medicationTypes = MedicationTypes::query()->create([
                            'path' => $path,
                            'name' => $request->file()['file1']->getClientOriginalName(),
                        ]);
                    else $medicationTypes->fill([
                        'path' => $path,
                        'name' => $request->file()['file1']->getClientOriginalName(),
                    ])->save();

                    return response([
                        'id' => $medicationTypes->id,
                        'name' => $medicationTypes->name,
                        'path' => $medicationTypes->path,
                    ], 201);

                    break;

                case "medication-file":
                    $path = $request->file()['file1']->store('medication/files');
                    $medicationFile = MedicationFile::query()
                        ->where(['id' => $request->id])
                        ->first();

                    if (!$medicationFile)
                        $medication = MedicationFile::query()->create([
                            'path' => $path,
                            'name' => $request->file()['file1']->getClientOriginalName(),
                        ]);
                    else $medicationFile->fill([
                        'path' => $path,
                        'name' => $request->file()['file1']->getClientOriginalName(),
                    ])->save();

                    return response([
                        'id' => $medication->id,
                        'name' => $medication->name,
                        'path' => $medication->path,
                    ], 201);

                    break;

                case 'medication-preview':
                    $path = $request->file()['file1']->store('medication/files');

                    if (empty($request->id)) {
                        $medication = $medication = Medication::query()->create();
                        $medicationPreview = MedicationPreview::query()
                            ->create([
                                'medication_id' => $medication->id,
                                'path' => $path,
                                'name' => $request->file()['file1']->getClientOriginalName(),
                            ]);

                        return response([
                            'id' => $medicationPreview->id,
                            'object_id' => $medication->id,
                            'name' => $medicationPreview->name,
                            'path' => $medicationPreview->path,
                        ], 201);
                    } else {
                        $medicationPreview = MedicationPreview::query()->find($request->id);

                        $medicationPreview->fill([
                            'path' => $path,
                            'name' => $request->file()['file1']->getClientOriginalName()
                        ])->save();

                        return response([
                            'id' => $medicationPreview->id,
                            'object_id' => $medicationPreview->medication->id,
                            'name' => $medicationPreview->name,
                            'path' => $medicationPreview->path,
                        ], 201);
                    }

                    break;

                case 'preview-news-image':
                    $path = $request->file()['file1']->store("news/files");

                    if (empty($request->id)) {
                        $new_preview = NewsPreview::query()
                            ->create([
                                'path' => $path,
                                'name' => $request->file()['file1']->getClientOriginalName()
                            ]);
                        $new = News::query()
                            ->create(['news_preview_id' => $new_preview->id]);
                    } else {
                        $new = News::query()
                            ->where(['news_preview_id' => $request->id])
                            ->first();

                        $new_preview = $new->preview;

                        $new_preview->fill([
                            'news_id' => $request->block_id ?? $new->id,
                            'path' => $path,
                            'name' => $request->file()['file1']->getClientOriginalName()
                        ])->save();
                    }

                    return response([
                        'id' => $new_preview->id,
                        'path' => $new_preview->path,
                        'object_id' => $new->id,
                        'name' => $new_preview->name
                    ], 201);

                    break;

                case "medication-character":
                    $path = $request->file()['file1']->store("news/files");

                    $medication = Medication::query()->findOrNew($request->id);

                    $medication->fill([
                        'instraction_path' => $path,
                        'instraction_name' => $request->file()['file1']->getClientOriginalName()
                    ])->save();

                    return response([
                        'id' => $medication->id,
                        'path' => $medication->instraction_path,
                        'object_id' => $medication->id,
                        'name' => $medication->instraction_name
                    ], 201);

                    break;

                case 'description-file':
                    $path = $request->file()['file1']->store("news/files");

                    $medication = Medication::query()->findOrNew($request->id);

                    $medication->fill([
                        'description_path' => $path,
                        'description_name' => $request->file()['file1']->getClientOriginalName()
                    ])->save();

                    return response([
                        'id' => $medication->id,
                        'path' => $medication->description_path,
                        'object_id' => $medication->id,
                        'name' => $medication->description_name
                    ], 201);
                    break;

                case 'card':
                    $path = $request->file()['file1']->store("medication/files");

                    $card = Card::query()->find($request->id);
                    $card->fill([
                        'path' => $path,
                        'name' => $request->file()['file1']->getClientOriginalName(),
                    ])->save();

                    return response($card, 201);

                    break;

                case "url":
                    $path = $request->file()['file1']->store("files");

                    $socialNetwork = SocialNetwork::query()->find($request->id);

                    $socialNetwork->fill([
                        'path' => $path,
                        'name' => $request->file()['file1']->getClientOriginalName()
                    ])->save();

                    return response($socialNetwork, 201);

                    break;

                default:
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
            }
    }

    public function delete(Request $request)
    {
        switch ($request->type) {
            case "person":
                $person = Person::query()->find($request->id);
                Storage::delete($person->path);
                $person->fill(['path' => null])->save();
                return response([], 200);
                break;

            case "requisites":
                $company = Company::query()->find($request->id);
                Storage::delete($company->requisites_path);
                $company->fill(['requisites_path' => null, 'requisites_name' => null])
                    ->save();
                return response([], 200);
                break;

            case "map-schema":
                $companyAddress = CompanyAddress::query()->find($request->id);
                Storage::delete($companyAddress->schema_path);
                $companyAddress->fill(['schema_path' => null, 'schema_name' => null])->save();
                return response([], 200);
                break;

            case "map-image":
                $companyAddress = CompanyAddress::query()->find($request->id);
                Storage::delete($companyAddress->photo_path);
                $companyAddress->fill(['photo_path' => null, 'photo_name' => null])->save();
                return response([], 200);
                break;

            case "medication-types":
                $medicationType = MedicationTypes::query()->find($request->id);
                Storage::delete($medicationType->path);
                $medicationType->fill(['path' => null, 'name' => null])->save();
                return response([], 200);
                break;

            case 'medication-preview':
                $medicationPreview = MedicationPreview::query()->find($request->id);
                Storage::delete($medicationPreview->path);
                $medicationPreview->fill(['path' => null, 'name' => null])->save();
                return response([], 200);
                break;

            case 'preview-news-image':
                $new_image = NewsPreview::query()->find($request->id);
                Storage::delete($new_image->path);
                $new_image->fill([
                    'path' => null,
                    'name' => null
                ])->save();
                return response([], 200);

                break;

            case "medication-character":
                $file = Medication::query()->find($request->id);

                Storage::delete($file->instraction_path);

                $file->fill([
                    'instraction_path' => null,
                    'instraction_name' => null
                ])->save();

                return response([], 200);

                break;

            case 'description-file':
                $file = Medication::query()->find($request->id);

                Storage::delete($file->description_path);

                $file->fill([
                    'description_path' => null,
                    'description_name' => null
                ])->save();

                return response([], 200);
                break;

            case 'card':
                $card = Card::query()->find($request->id);

                Storage::delete($card->path);

                $card->fill([
                    'path' => null,
                    'name' => null
                ])->save();

                return response([], 200);
                break;

            case "url":
                $socialNetwork = SocialNetwork::query()->find($request->id);
                Storage::delete($socialNetwork->path);
                $socialNetwork->fill(['path' => null, 'name' => null])->save();
                return response([], 200);

                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Изменение последовательности следования изображения и текста
     *
     * @param Request $request
     * @return void
     */
    public function changeSequence(Request $request)
    {
        Block::query()
            ->find($request->block_id)
            ->fill(['block_order' => $request->sequence])
            ->save();

        return response([]);
    }
}
