@extends('layouts.app')

@section('title', $folder->name)

@section('content')
<div class="l-content">
    <a href="{{ route('memo.create') }}">新規メモ</a>
</div>
@endsection
