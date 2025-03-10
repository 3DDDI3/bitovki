<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Main\QA;
use Illuminate\Http\Request;

class QAController extends Controller
{
    private $PATH = 'main.qa';
    private $TITLE = ['Ответы на вопросы', 'ответа на вопрос'];

    public function index(Request $request)
    {
        $path = "$this->PATH";
        $title = $this->TITLE;

        $objects = QA::query()->paginate(10);

        if ($request->search)
            $objects = QA::query()
                ->where("question", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->paginate(10);

        if ($id = $request->delete) {
            $item = QA::find($id);
            $item->delete();
            // AdminEventLogs::log($item, $id);
            return redirect()
                ->back()
                ->with('message', 'Удалено');
        }

        return view('admin.modules.' . $path . '.index', compact('objects', 'path', 'title'));
    }

    public function edit(Request $request, $id = null)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $object = $id ? QA::find($id) : new QA();

        if ($request->isMethod('post')) {
            $object->fill($request->only(['question', 'answer']));

            $object->save();

            // AdminEventLogs::log($object, $id);

            return redirect()
                ->route(
                    'admin.' . $this->PATH . '.edit',
                    ['id' => $object->id]
                )->with('message', 'Сохранено');
        }

        return view('admin.modules.' . $this->PATH . '.edit', compact(
            'object',
            'path',
            'title',
        ));
    }
}
