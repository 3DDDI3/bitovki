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
        $object = Setting::find(1);

        $socialNetworks = SocialNetwork::all();

        if ($request->isMethod('post')) {

            foreach ($request->input() as $key => $value) {
                if (preg_match("/(url)_(\d+)/", $key,  $matches)) {
                    for ($i = 0; $i < count($matches); $i++) {
                        if (empty($matches[$i])) array_splice($matches, $i, 1);
                    }

                    SocialNetwork::query()
                        ->find($matches[2])
                        ->fill([$matches[1] => $value])
                        ->save();
                }
            }

            // FileUpload::uploadImage('logo', Setting::class, 'logo', $object->id, 152, 47, '/images/', false, $request);
            // \App\Models\User\AdminEventLogs::log($object, $object->id);
            return redirect()->back()->with('message', 'Изменено');
        }

        return view('admin.modules.settings.index', compact(
            'object',
            'socialNetworks'
        ));
    }
}
