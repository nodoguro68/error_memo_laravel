@extends('layouts.app')

@section('title', 'メールアドレス変更')

@section('content')
<div class="content">
    <form action="{{ route('mypage.email.send') }}" method="post">
        @csrf
        <div class="form__head">
            <p class="form__description">
            </p>
        </div>
        <div class="form__body">
            <div class="form__group">
                {{ Auth::user()->email }}
            </div>
            <div class="form__group">
                <label for="email" class="form__label">新しいメールアドレス</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form__input" id="email">
                @include('components.form-error-msg', ['name' => 'email'])
            </div>
        </div>
        <div class="form__foot">
            <button type="submit">送信</button>
        </div>
    </form>
</div>
@endsection
