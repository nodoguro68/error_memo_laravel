<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoRequest extends FormRequest
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
            'category_id' => 'nullable|integer',
            'folder_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|max:1000',
            'attempt' => 'nullable|string|max:1000',
            'solution' => 'nullable|string|max:1000',
            'cause' => 'nullable|string|max:1000',
            'reference' => 'nullable|url|max:255',
            'is_solved' => 'required|integer',
            'is_published' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'カテゴリー',
            'folder_id' => 'フォルダ',
            'is_solved' => '解決',
            'is_published' => '公開',
            'title' => 'タイトル',
            'content' => '内容',
            'attempt' => '試したこと',
            'solution' => '解決方法',
            'cause' => '原因',
            'reference' => '参考',
        ];
    }
}
