<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Lending\Personal;
use App\Models\User\AdminEventLogs;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public $PATH = 'services.personal';
    public $TITLE = ['Сотрудники', 'сотрудника'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = Personal::query()->where('hide', 0)->orderBy('rating', 'desc')->orderBy('id', 'desc')->paginate(10);

        if ($request->search) {
            $objects = $objects->where('name', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%');
        }

        if ($id = $request->delete) {
            $item = Personal::find($id);
            $item->delete();
            AdminEventLogs::log($item, $id);
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.' . $path . '.index', compact(
            'objects',
            'path',
            'title',
        ));
    }

    public function edit(Request $request, $id = null)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $object = $id ? Personal::find($id) : new Personal();

        if ($request->isMethod('post')) {
            $object->fill(
                $request->only(
                    [
                        'name',
                        'email',
                        'description',
                    ]
                )
            );

            $object->save();

            AdminEventLogs::log($object, $id);

            return redirect()->route('admin.' . $this->PATH . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        return view('admin.modules.' . $this->PATH . '.edit', compact(
            'object',
            'path',
            'title',
        ));
    }
}
