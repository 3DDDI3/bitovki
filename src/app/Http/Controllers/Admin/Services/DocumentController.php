<?php

namespace App\Http\Controllers\Admin\Services;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Services\File;
use App\Models\User\AdminEventLogs;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public $PATH = 'services.documents';
    public $TITLE = ['Документы', 'документа'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = File::orderBy('rating', 'desc')->orderBy('id', 'desc')->paginate(10);

        if ($request->search) {
            $objects = $objects->where('name', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%');
        }

        if ($id = $request->delete) {
            $item = File::find($id);
            $item->delete();
            AdminEventLogs::log($item, $id);
            return redirect()->back()->with('message', 'Удалено');
        }

        return view('admin.modules.' . $path . '.index', compact(
            'objects',
            'path',
            'title'
        ));
    }

    public function edit(Request $request, $id = null)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $object = $id ? File::find($id) : new File();

        if ($request->isMethod('post')) {
            if ($object == null) $object = new File();
            $object->fill($request->only(['name']));
            
            $object->save();

            if ($request->file('file') != null)
                FileUpload::uploadFile('file', $object, 'path', $object->id, '/storage/files');

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
