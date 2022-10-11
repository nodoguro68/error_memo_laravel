@extends('layouts.app')

@section('title', 'フォルダ一覧')

@section('content')
<div class="wrap" style="display: flex">
    
    @include('components.sidebar')
    <div class="content">
    <a href="{{ route('memo.create') }}">新規メモ</a>
        
    </div>
</div>
@endsection
