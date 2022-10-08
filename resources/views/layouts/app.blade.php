<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components/head')
<body>
    @include('components/header')

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
