@extends('layouts.app')

@section('title', 'すべてのメモ')

@section('content')
<div class="l-content">
    <h2 class="">すべてのメモ</h2>
    <ul>
        @foreach ($memos as $memo)
            <li>
                <a href="{{ route('memo.show', $memo->id) }}">{{ $memo->title }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('memo.create') }}">新規メモ</a>
</div>
@endsection
