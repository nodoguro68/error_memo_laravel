@extends('layouts.app')

@section('title', 'メモ新規登録')

@section('content')
<div class="l-content">
    <form action="{{ route('memo.store') }}" method="post">
        @csrf

        <div class="form__head">
            <div class="form__group">
                <label for="category" class="form__label">カテゴリー</label>
                <select name="category_id" class="form__selectbox" id="category">
                    <option value="">未分類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__group">
                <label for="folder" class="form__label">フォルダ</label>
                <select name="folder_id" class="form__selectbox" id="category">
                    <option value="">未分類</option>
                    @foreach ($folders as $folder)
                        <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__group">
                <label for="title" class="form__label">タイトル</label>
                <input type="text" class="form__input" id="title" name="title" value="{{ old('title') }}">
                @include('components.form-error-msg', ['name' => 'title'])
            </div>
            <div class="form__group">
                <label for="unsolved">未解決</label>
                <input type="radio" name="is_solved" value="0" class="form__radio" id="unsolved" checked>
                <label for="">解決済</label>
                <input type="radio" name="is_solved" value="1" class="form__radio" id="solved">
            </div>
            <div class="form__group">
                <label for="unsolved">非公開</label>
                <input type="radio" name="is_published" value="0" class="form__radio" id="private" checked>
                <label for="">公開</label>
                <input type="radio" name="is_published" value="1" class="form__radio" id="publish">
            </div>
        </div>

        <div class="form__body">
            <div class="form__group">
                <label for="content" class="form__label">内容</label>
                <textarea name="content" class="form__textarea" id="content">{{ old('content') }}</textarea>
                @include('components.form-error-msg', ['name' => 'content'])
            </div>
            <div class="form__group">
                <label for="attempt" class="form__label">試したこと</label>
                <textarea name="attempt" class="form__textarea" id="attempt">{{ old('attempt') }}</textarea>
                @include('components.form-error-msg', ['name' => 'attempt'])
            </div>
            <div class="form__group">
                <label for="solution" class="form__label">解決方法</label>
                <textarea name="solution" class="form__textarea" id="solution">{{ old('solution') }}</textarea>
                @include('components.form-error-msg', ['name' => 'solution'])
            </div>
            <div class="form__group">
                <label for="cause" class="form__label">原因</label>
                <textarea name="cause" class="form__textarea" id="cause">{{ old('cause') }}</textarea>
                @include('components.form-error-msg', ['name' => 'cause'])
            </div>
            <div class="form__group">
                <label for="reference" class="form__label">参考</label>
                <input type="text" class="form__input" id="reference" name="reference" value="{{ old('reference') }}">
                @include('components.form-error-msg', ['name' => 'reference'])
            </div>
        </div>


        <div class="form__foot">
            <div class="form__group">
                <button type="submit">保存</button>
            </div>
        </div>

    </form>
</div>
@endsection
