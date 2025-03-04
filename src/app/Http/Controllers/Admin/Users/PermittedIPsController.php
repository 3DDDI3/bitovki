<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User\PermittedIPs;
use Illuminate\Http\Request;

class PermittedIPsController extends Controller
{
    public $PATH = 'users.permitted_ips';
    public $TITLE = ['Разрешенные IP адреса', 'IP'];
    public $MODEL = PermittedIPs::class;

    public function index(Request $request)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $objects = $this->MODEL::orderBy('id' , 'desc' );

        if($request->search){
            $objects = $objects->where('name', 'LIKE' , '%'.str_replace(' ' , '%' , $request->search).'%');
        }

        if ($id = $request->delete){
            $item = $this->MODEL::find($id);
            $item->delete();
            \App\Models\User\AdminEventLogs::log(false, $id);
            return redirect()->back()->with('message' , 'Удалено');
        }

        $objects = $objects->get();

        return view('admin.'.$path.'.index' , compact('objects', 'path', 'title'));
    }

    public function edit(Request $request , $id = null)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $object = $id ? $this->MODEL::find($id) : new $this->MODEL();

        if ($request->isMethod('post')){
            $object->fill($request->except(['_token', 'image']));
            $object->save();
            \App\Models\User\AdminEventLogs::log($object, $id);
            return redirect()->route('admin.'.$this->PATH.'.edit' , ['id' => $object->id])->with('message' , 'Сохранено');
        }

        return view('admin.'.$this->PATH.'.edit' , compact('object' ,  'path', 'title'));
    }

}
