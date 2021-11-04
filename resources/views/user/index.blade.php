@extends('layouts.index')

@section('title', 'Пользователи')

@section('body')
    <main class="container text-center">
        <h1 class="mt-3">Список пользователей</h1>
        <div style="overflow-x: auto;">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Номер</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Активен</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr class="@if($user->active) table-success @else table-danger @endif">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>+7{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->admin) <span class="text-danger">[adm]</span> @else
                                <form action="{{ route('users.activate', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn py-0 border- border-secondary" type="submit">{{ $user->active ? 'Да' : 'Нет' }}</button>
                                </form>
                            @endif </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </main>


@endsection

