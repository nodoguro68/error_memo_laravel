<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
        // 現在のパスワードとDBのパスワードが同じ
        // 現在のパスワードと新しいパスワードが異なる
        // 確認
        return [
            'current_password' => 'required|string|half|min:8|max:255|verify',
            'new_password' => 'required|string|half|min:8|max:255|confirmed',
            'new_password_confirmation' => 'required|string|half|min:8|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'current_password' => '現在のパスワード',
            'new_password' => '新しいパスワード',
            'new_password_confirmation' => '確認用の新しいパスワード'
        ];
    }

    public function messages()
    {
        return [
            'verify' => '現在のパスワードが違います',
            'half' => '半角で入力してください',
        ];
    }
}
