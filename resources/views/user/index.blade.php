@extends('layouts.index')

@section('title', 'Пользователи')

@push('scripts-head')
    @livewireStyles
@endpush

@section('body')
    <main class="container text-center">
        <h1 class="mt-3 display-4">Список пользователей</h1>

        <livewire:userlist/>
    </main>


@endsection

@push('scripts-footer')
    @livewireScripts
@endpush
