<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Constructor\Block;
use App\Models\Constructor\BlockPerson;
use App\Models\Constructor\Person;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function attach(Request $request)
    {
        $person = Person::query()
            ->where(['name' => $request->personal])
            ->first();

        BlockPerson::query()->create([
            'person_id' => $person->id,
            'block_id' => $request->block_id
        ]);

        return response([], 200);
    }

    public function detach(Request $request)
    {
        $person = Person::query()
            ->where(['name' => $request->personal])
            ->first();

        BlockPerson::query()
            ->where(['person_id' => $person->id, 'block_id' => $request->block_id])
            ->first()
            ->delete();

        return response([], 200);
    }
}
