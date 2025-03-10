<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        $object = Setting::find(1) ?? new Setting();

        if ($request->isMethod('post')) {

            $object->fill($request->only([
                'address',
                'phone',
                'email',
                'inn',
                'ogrn',
            ]));

            $object->save();

            // FileUpload::uploadImage('logo', Setting::class, 'logo', $object->id, 152, 47, '/images/', false, $request);
            // \App\Models\User\AdminEventLogs::log($object, $object->id);
            return redirect()->back()->with('message', 'Изменено');
        }

        return view('admin.modules.settings.index', compact(
            'object'
        ));
    }
}
