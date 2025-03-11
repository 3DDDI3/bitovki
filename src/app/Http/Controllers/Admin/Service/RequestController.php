<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Main\Request as MainRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $request)
    {

        $objects = MainRequest::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($request->search) {
            $objects =  MainRequest::query()
                ->where('phone', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->paginate(10)
                ->withQueryString();
        }

        if ($id = $request->delete) {
            $item = MainRequest::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.services.index', compact('objects'));
    }
}
