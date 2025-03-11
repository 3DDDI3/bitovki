<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Main\Request;

class RequestController extends Controller
{
    public function create(PostRequest $request)
    {
        $data = $request->validated();

        Request::query()->create([
            'phone' => $data['tel'],
            'comment' => $data['comment'],
        ]);

        return response([], 200);
    }
}
