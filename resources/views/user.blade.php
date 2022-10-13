@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="content">
    <div class="user-info">
        <div class="">
            <img src="" alt="アバター" class="">
        </div>
        <div class="">
            {{ $user->name }}
            github:{{ $user->github }}
        </div>
        <ul class="">
            @if (!$user->publish_memos()->isEmpty())
                @foreach ($user->publish_memos() as $memo)
                    <li class="">
                        <a href="{{ route('memo.show', $memo->id) }}" class="">
                            {{ $memo->title }}
                        </a>
                    </li>
                @endforeach
            
            @endif
        </ul>
    </div>
</div>
@endsection
