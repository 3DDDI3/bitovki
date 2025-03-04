<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {

        $objects = CompanyRequest::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($request->search) {
            $objects =  CompanyRequest::query()
                ->where('phone', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->orWhere('fio', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->paginate(10)
                ->withQueryString();
        }

        if ($id = $request->delete) {
            $item = CompanyRequest::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.feedback.company', compact('objects'));
    }
}
