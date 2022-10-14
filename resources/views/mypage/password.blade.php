@extends('layouts.app')

@section('title', 'パスワード変更')

@section('content')
<div class="content">
    <form action="{{ route('mypage.password.update') }}" method="post">
        @csrf
        <div class="form__head">
            <p class="form__description">
            </p>
        </div>
        <div class="form__body">
            <div class="form__group">
                <label for="current_password" class="form__label">現在のパスワード</label>
                <input type="password" name="current_password" value="{{ old('current_password') }}" class="form__input" id="current_password">
                @include('components.form-error-msg', ['name' => 'current_password'])
            </div>
            <div class="form__group">
                <label for="new_password" class="form__label">新しいパスワード</label>
                <input type="password" name="new_password" value="{{ old('new_password') }}" class="form__input" id="new_password">
                @include('components.form-error-msg', ['name' => 'new_password'])
            </div>
            <div class="form__group">
                <label for="new_password_confirmation" class="form__label">新しいパスワード（確認）</label>
                <input type="password" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" class="form__input" id="new_password_confirmation">
                @include('components.form-error-msg', ['name' => 'new_password_confirmation'])
            </div>
        </div>
        <div class="form__foot">
            <button type="submit">送信</button>
        </div>
    </form>
</div>
@endsection
