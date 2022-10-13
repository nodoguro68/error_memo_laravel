@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
<div class="content">
    <form action="{{ route('mypage.profile.update') }}" method="post">
        @csrf
        <div class="form__head">
            <div class="form__group">
                <img src="" alt="アバター">
                <input type="file" name="avatar" value="" class="" id="">
                @include('components.form-error-msg', ['name' => 'avatar'])
            </div>
        </div>
        <div class="form__body">
            <div class="form__group">
                <label for="name" class="form__label">ユーザー名</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form__input" id="name">
                @include('components.form-error-msg', ['name' => 'name'])
            </div>
            <div class="form__group">
                <label class="form__label">メールアドレス</label>
                <div class=""></div><a href="{{ route('mypage.email.show') }}">変更する</a>
            </div>
            <div class="form__group">
                <label for="github" class="form__label">Github</label>
                <input type="text" name="github" value="{{ old('github', $user->github) }}" class="form__input" id="github">
                @include('components.form-error-msg', ['name' => 'github'])
            </div>
        </div>
        <div class="form__foot">
            <button type="submit">保存</button>
        </div>
    </form>
</div>
@endsection
