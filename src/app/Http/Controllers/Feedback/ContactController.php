<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {

        $objects = ContactRequest::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($request->search) {
            $objects = ContactRequest::query()->where('phone', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->orWhere('name', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%')
                ->paginate(10)
                ->withQueryString();
        }

        if ($id = $request->delete) {
            $item = ContactRequest::query()->find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.feedback.contact', compact('objects'));
    }
}
