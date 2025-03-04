<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        $breadCrumbs = collect([
            (object)[
                'name' => 'Главная',
                'url' => '/',
            ],
            (object)[
                'name' => 'Агентствам',
                'url' => 'agency'
            ]
        ]);

        return view('pages.agency', [
            'breadcrumbs' => $breadCrumbs
        ]);
    }
}
