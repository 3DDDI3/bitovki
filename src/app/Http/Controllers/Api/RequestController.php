<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyPostRequest;
use App\Http\Requests\ContactPostRequest;
use App\Http\Requests\PharmacovigilancePostRequest;
use App\Models\CompanyRequest;
use App\Models\ContactRequest;
use App\Models\Gender;
use App\Models\RequestModel;
use App\Models\SenderType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function pharmacovigilance(PharmacovigilancePostRequest $request)
    {
        $validated = $request->validated();

        RequestModel::query()->create([
            'pacient' => $validated['patient'],
            'gender_id' => Gender::query()->where(['gender' => $validated['gender']])->first()->id,
            'sender_type_id' => SenderType::query()->where(['type' => $validated['sender']])->first()->id,
            'age' => empty($request->age) ? $request->age_lat : $request->age,
            'sender' => $validated['fio'],
            'communication_method' => $validated['link'],
            'medication' => $validated['title'],
            'series' => $validated['seria'],
            'dosing' => $validated['dosing'],
            'indication' => $validated['indications'],
            'treatment_beginning' => Carbon::createFromFormat('d.m.Y', $validated['beg_date']),
            'treatment_ending' => Carbon::createFromFormat('d.m.Y', $validated['end_date']),
            'reaction_beginning' => Carbon::createFromFormat('d.m.Y', $validated['reaction_beg_date']),
            'reaction_ending' => Carbon::createFromFormat('d.m.Y', $validated['reaction_end_date']),
            'reaction_description' => $validated['reaction'],
            'actions' => $validated['actions'],
            'therapy' => $validated['therapy'],
            'other_medication' => $validated['another_mediactions'],
            'other' => $validated['another_description'],
            'pregnancy_duration' => $validated['term'],
        ]);

        return response([], 201);
    }

    public function company(CompanyPostRequest $request)
    {
        $data = $request->validated();

        CompanyRequest::query()->create([
            'sender_type_id' => SenderType::query()->where(['type' => $data['consumer']])->first()->id,
            'fio' => $data['fio'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'email' => $data['email'],
            'text' => $data['description'],
            'mediaction_title' => $data['medication'],
            'dosing' => $data['dosing'],
            'seria' => $data['seria'],
        ]);

        return response([], 201);
    }

    public function contact(ContactPostRequest $request)
    {
        $data = $request->validated();

        ContactRequest::query()->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'text' => $data['text'],
        ]);

        return response([], 201);
    }
}
