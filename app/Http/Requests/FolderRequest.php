<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FolderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:folders'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'フォルダ名'
        ];
    }

    public function messages()
    {
        return [
            'required' => '空白のみで入力できません'
        ];
    }
}
