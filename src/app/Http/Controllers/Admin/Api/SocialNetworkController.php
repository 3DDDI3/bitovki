<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialNetworkController extends Controller
{
    public function create(Request $request)
    {
        $socialNetwork = SocialNetwork::query()->create();

        return response($socialNetwork->only(['id']), 201);
    }

    public function delete(Request $request)
    {
        $socialNetwork = SocialNetwork::query()
            ->find($request->block_id);

        if (!empty($socialNetwork->path))
            Storage::delete($socialNetwork->path);

        $socialNetwork->delete();

        return response([], 200);
    }
}
