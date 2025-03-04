<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Pharmacovigilance;
use App\Models\RequestModel;
use Illuminate\Http\Request;

class PharmacovigilanceController extends Controller
{
    public function index(Request $request)
    {

        $objects = RequestModel::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($request->search) {
            $objects = RequestModel::query()
                ->where('sender', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->orWhere('medication', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->paginate(10)
                ->withQueryString();
        }

        if ($id = $request->delete) {
            $item = RequestModel::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.feedback.pharmacovigilance', compact('objects'));
    }
}
