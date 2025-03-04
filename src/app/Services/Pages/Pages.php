<?php

namespace App\Services\Pages;

use App\Models\Page\Page;

class Pages implements \App\Contracts\Pages
{
    public $model;
    public $request;

    public function __construct(
        Page $model,
        \Request $request
    )
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function detect()
    {
       $path = $this->request::path();

       if (!$path)
           return $this->model::where('page_code', 'main')->first();
       else
           $url = explode('/', $path)[0];

       return $this->model::where('url', $url)->first();
    }

}
