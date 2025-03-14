<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tel' => ['required', 'string'],
            'comment' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Поле телефон обязательное',
            'comment.required' => 'Поле комментарий обязательное',
        ];
    }
}
