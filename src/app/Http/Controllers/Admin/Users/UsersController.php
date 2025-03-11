<?php

namespace App\Http\Controllers\Admin\Users;

use App\Helpers\Admin\Helper;
use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\UserСlass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public $PATH = 'services.users';
    public $TITLE = ['Пользователи', 'пользователя'];

    public function index(Request $request)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $objects = User::query()->orderBy('name')->paginate(10);

        if ($request->search) {
            $objects = User::query()
                ->where("email", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->orWhere("name", "LIKE", "%" . str_replace(' ', '%', $request->search) . "%")
                ->paginate(10)
                ->withQueryString();
        }


        $search_select = (int) $request->select ?? 0;
        if (!empty($search_select))
            $objects = User::query()
                ->where('user_class_id', $search_select)
                ->paginate(10);

        if ($id = $request->delete) {
            $item = User::find($id);
            $item->delete();
            \App\Models\User\AdminEventLogs::log($item, $id);
            return redirect()->back()->with('message', 'Удалено');
        }

        foreach ($objects as $item) {
            $user_class = UserСlass::find($item->class_id ?? 0);
            $item->class_name = $user_class->name ?? '';
        }

        $select = UserСlass::all();
        $select_label = 'Класс пользователя:';

        return view('admin.modules.services.users.index', compact('objects', 'path', 'title', 'select', 'select_label'));
    }

    public function edit(Request $request, $id = null)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $object = $id ? User::find($id) : new User();

        if ($request->isMethod('post')) {

            $object->user_class_id = $request->class ?? 3;

            if ($object->user_class_id == 3)
                $object->is_admin = 0;
            else
                $object->is_admin = 1;

            if (!empty($request->password) || empty($id)) {
                $object->password = Hash::make($request->password);
            }

            $unique = self::unique($object, 'email', $request->email, 'email');
            if (!empty($unique))
                return $unique;

            // if (!empty($request->phone)) {
            //     // $phone_code = $request->phone_code ?? '';
            //     // $phone = $request->phone ?? '';
            //     // $phone_all = $phone_code . ' ' . $phone;
            //     // $unique = self::unique($object, 'phone', $phone_all, 'телефоном');
            //     // if (!empty($unique))
            //         // return $unique;
            //     // $object->phone = $phone_all;
            // } else {
            //     $object->phone = null;
            // }

            $object->name = $request->name ?? '';

            $object->fill($request->except(['_token', 'password']));

            $object->save();

            // FileUpload::uploadImage('image', User::class, 'image', $object->id, 100, 100, '/images/users', false, $request);

            // \App\Models\User\AdminEventLogs::log($object, $id);

            return redirect()->route('admin.services.users.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        $userTypes = collect();

        foreach (UserСlass::query()->orderBy('name')->get() as $userClass) {
            $userTypes->push((object)[
                "id" => $userClass->id,
                "name" => $userClass->name,
            ]);
        }

        $userTypes->prepend((object)[
            "id" => 0,
            "name" => "Ничего не выбрано",
        ]);

        $userTypeHeader = $object->user_class->name ?? 0;

        // $select_phone_code = Phone_code::list(); //Список кодов телефонов
        // $select_client_card = ClientCard::list($id); //Список кодов телефонов
        // $select_client_type = ClientType::list($id); //Список типов клиентов

        $object = self::phone_break($object);

        return view(
            'admin.modules.services.users.edit',
            compact(
                'path',
                'title',
                'object',
                'userTypes',
                'userTypeHeader'
                // 'select_phone_code',
                // 'select_client_card',
                // 'select_client_type'
            )
        );
    }

    private static function unique($object, $field, $value, $text)
    {
        $value = trim($value);
        if (!empty($value)) {
            $user_other = User::where($field, $value)->where('id', '<>', $object->id)->first();
            if ($user_other) {
                $email = $object->email;
                if (empty($email))
                    $object->email = 'email' . Helper::hash();
                $object->save();
                if (empty($email)) {
                    $object->email = 'email' . $object->id;
                    $object->save();
                }
                return redirect()->route('admin.services.users.edit', ['id' => $object->id])->with('message_' . $field, 'Пользователь с таким ' . $text . ' уже существует: <strong>' . $value . '</strong>');
            }
        }
        return;
    }

    //Разделение кода телефона от самого телефона
    private static function phone_break($object)
    {
        $phone = $object->phone ?? '';

        // if (!empty($phone)) {
        //     $arr = explode('(', $phone);
        //     $phone_code = trim($arr[0] ?? '');
        //     $phone_all = '(' . trim($arr[1] ?? '');

        //     if (empty($arr[1])) {
        //         $object->phone = '';
        //         $object->save();
        //         return $object;
        //     }

        //     if (!empty($phone_code) && !empty($phone_all)) {
        //         $object->phone_code = $phone_code;
        //         $object->phone = $phone_all;
        //     }
        // }

        // if (empty($object->phone_code))
        //     $object->phone_code = '+7';

        return $object;
    }
}
