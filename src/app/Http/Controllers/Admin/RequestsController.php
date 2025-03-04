<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainSlider;
use App\Models\Requests;
use Illuminate\Http\Request;
use App\Helpers\FileUpload;
use Illuminate\Support\Facades\Storage;

class RequestsController extends Controller
{
    public function index(Request $request)
    {

        $objects = Requests::orderBy('id', 'desc');

        if ($request->search) {
            $objects = $objects->where('phone', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->orWhere('name', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%');
        }

        if ($id = $request->delete) {
            $item = Requests::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $objects = $objects->get();

        return view('admin.modules.requests.index', compact('objects'));
    }
}
