@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<div class="l-content l-content--sm">
    
    <form method="POST" action="{{ route('login') }}" class="p-form">
        @csrf
        
        <div class="p-form__head">
            <h2 class="p-form__title">ログイン</h2>
        </div>
        <div class="p-form__body">
            <div class="p-form__group">
                <label for="email" class="p-form__label">メールアドレス</label>
    
                <input id="email" type="text" class="p-form__input @error('email') p-form__input--error @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
    
                @include('components.form-error-msg', ['name' => 'email'])
            </div>
    
            <div class="p-form__group">
                <label for="password" class="p-form__label">パスワード</label>
    
                <input id="password" type="password" class="p-form__input @error('password') p-form__input--error @enderror" name="password" autocomplete="current-password">
    
                @include('components.form-error-msg', ['name' => 'password'])
            </div>
        </div>

        <div class="p-form__foot">
            <div class="p-form__group">
                <input class="p-form__checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                <label class="" for="remember">次回から自動的にログイン</label>
            </div>
    
            <div class="p-form__group">
                <div class="p-form__btn-container">
                    <button type="submit" class="c-submit-btn">ログイン</button>
                </div>
            </div>
            <div class="p-form__link">
                @if (Route::has('password.request'))
                    <a class="c-link" href="{{ route('password.request') }}">パスワードを忘れた場合</a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
