@extends('layouts.app')

@section('title', $memo->title)

@section('content')
<div class="l-content">
    <div class="memo">
        <div class="memo__head">
            <a href="{{ route('folder.show', $memo->folder_id) }}">フォルダに戻る</a>
            <div class="memo__badge">
                {{ $memo->is_solved }}
            </div>
            <div class="memo__badge">
                {{ $memo->is_published }}
            </div>
            <div class="memo__item">
                @if ($memo->category_id === null)
                    未分類
                @else
                    {{ $memo->category->name }}
                @endif
            </div>
            @auth
                <div class="memo__item">
                @if ($memo->folder_id === null)
                    未分類
                @else
                    {{ $memo->folder->name }}
                @endif
                </div>
            @endauth
            <div class="memo__item">
                <h2 class="memo__title">{{ $memo->title }}</h2>
            </div>
        </div>
        <div class="memo__body">
            <div class="memo__item">
                <p class="memo__text">{{ $memo->content }}</p>
            </div>
            <div class="memo__item">
                <p class="memo__text">{{ $memo->attempt }}</p>
            </div>
            <div class="memo__item">
                <p class="memo__text">{{ $memo->solution }}</p>
            </div>
            <div class="memo__item">
                <p class="memo__text">{{ $memo->cause }}</p>
            </div>
            <div class="memo__item">
                <p class="memo__text"><a href="{{ $memo->reference }}">{{ $memo->reference }}</a></p>
            </div>
        </div>
        <div class="memo__foot">
            {{-- いいねボタン --}}
            {{-- 投稿ユーザー情報 --}}
            @auth
                <a href="{{ route('memo.edit', $memo->id) }}">編集</a>
                <button type="button">削除</button>
            @endauth
        </div>
    </div>
</div>
@endsection
