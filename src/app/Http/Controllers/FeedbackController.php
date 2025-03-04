<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        $requests = new Requests();

        $requests->fill(
            $request->only([
                'name',
                'phone',
                'email',
                'text',
            ])
        )->save();

        Mail::to("info@mangaspace.ru")->send(new FeedbackMail($requests));

        return response()->json(['message' => 'Мы свяжемся с вами в ближайшее время'], 200);
    }
}
