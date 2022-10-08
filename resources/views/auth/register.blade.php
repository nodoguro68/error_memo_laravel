@extends('layouts.app')

@section('title', '新規会員登録')

@section('content')
<div class="l-content l-content--sm">
    
    <form method="POST" action="{{ route('register') }}" class="p-form">
        @csrf
        
        <div class="p-form__head">
            <h2 class="p-form__title">新規会員登録</h2>
        </div>
        <div class="p-form__body">
            <div class="p-form__group">
                <label for="email" class="p-form__label">メールアドレス</label>
                <input id="email" type="email" class="p-form__input @error('email') p-form__input--error @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                @error('email')
                    <span class="c-error-message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="p-form__group">
                <label for="password" class="p-form__label p-form__label--password">パスワード</label><span class="p-form__note">※8文字以上英数字</span>
                <input id="password" type="password" class="p-form__input @error('password') p-form__input--error @enderror" name="password"  autocomplete="new-password">
                @error('password')
                    <span class="c-error-message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="p-form__group">
                <label for="password-confirm" class="p-form__label">パスワード（確認）</label>
                <input id="password-confirm" type="password" class="p-form__input @error('password_confirmation') p-form__input--error @enderror" name="password_confirmation"  autocomplete="password-confirm">
                @error('password_confirmation')
                    <span class="c-error-message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="p-form__foot">
            <p class="p-form__description">
                新規登録すると、<a href="" class="p-form__link">利用規約</a>および <a href="" class="p-form__link">プライバシーポリシー</a>に同意したとみなされます。
            </p>
            <div class="p-form__group">
                <div class="p-form__btn-container">
                    <button type="submit" class="c-submit-btn">登録</button>
                </div>
            </div>
        </div>


    </form>
</div>
@endsection
