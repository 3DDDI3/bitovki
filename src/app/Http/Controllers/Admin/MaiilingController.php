<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mailler;

class MaiilingController extends Controller
{
    public function index()
    {

        $objects = Mailler::orderBy('id', 'desc')->paginate(10);

        if (request()->search) {
            $objects = Mailler::query()->where('email', 'LIKE', '%' . str_replace(' ', '%', request()->search) . '%')->paginate(10);
        }

        if ($id = request()->delete) {
            $item = Mailler::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.mailling.index', compact('objects'));
    }
}
