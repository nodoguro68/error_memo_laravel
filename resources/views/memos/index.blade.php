@extends('layouts.app')

@section('title', 'メモ一覧')

@section('content')
<div class="l-content">
    <form action="{{ route('memo.search') }}" method="get">
        <input type="text" name="keyword" placeholder="キーワード">
        <button type="submit">検索</button>
    </form>

    <ul class="memo-list">
        @if (!$memos->isEmpty()) 
            @foreach ($memos as $memo)
                <li class="memo-list__item">
                    <a href="{{ route('memo.show', $memo->id) }}" class="memo-list__link">
                        {{ $memo->title }}
                    </a>
                    <div>
                        {{ $memo->user->name }}
                    </div>
                </li>
            @endforeach
        @else
            <div>
                メモがありません
            </div>
        @endif
    </ul>

    {{ $memos->links('vendor.pagination.default') }}
</div>
@endsection
