@extends('layouts.app')

@section('title', 'フォルダ一覧')

@section('content')
<div class="l-content">

    <ul>
        
    </ul>
    
    <form action="{{ route('folder.store') }}" method="post">
        @csrf

        <input type="text" class="@error('email') p-form__input--error @enderror" name="folder" value="{{ old('folder') }}" >
        @include('components.form-error-msg', ['name' => 'folder'])

        <button type="submit" class="c-submit-btn">追加</button>
    </form>
</div>
@endsection
