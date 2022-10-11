@extends('layouts.app')

@section('title', 'フォルダ一覧')

@section('content')
<div class="l-content">
    <a href="{{ route('folder.all') }}">すべてのメモ</a>

    <ul>
        <li>
            <a href="" class="">未分類</a>
        </li>
        @foreach ($folders as $folder)
            <li>
                <a href="{{ route('folder.show', $folder->id) }}">
                    {{ $folder->name }}
                </a>
            </li>
        @endforeach
    </ul>
    
    <form action="{{ route('folder.store') }}" method="post">
        @csrf

        <input type="text" class="@error('email') p-form__input--error @enderror" name="folder" value="{{ old('folder') }}" >
        @include('components.form-error-msg', ['name' => 'folder'])

        <button type="submit" class="c-submit-btn">追加</button>
    </form>
</div>
@endsection
