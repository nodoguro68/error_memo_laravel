@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
<div class="wrap" style="display: flex">
    
    @include('components.sidebar')
    <div class="content">
    <a href="{{ route('memo.create') }}">新規メモ</a>
        
    </div>
</div>
<ul>
    <li class="">
        <a href="{{ route('mypage.profile.show') }}" class="">プロフィール編集</a>
    </li>
    <li class="">
        <a href="{{ route('mypage.password.show') }}" class="">パスワード変更</a>
    </li>
    <li class="">
        <a href="{{ route('mypage.email.show') }}" class="">メールアドレス変更</a>
    </li>
    <li class="">
        <a href="{{ route('mypage.signout.show') }}" class="">退会</a>
    </li>
</ul>
@endsection
