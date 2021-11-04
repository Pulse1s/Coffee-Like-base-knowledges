<div style="overflow-x: auto;">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">
                <button class="btn py-0 fw-bold" wire:click="orderById">id</button>
            </th>
            <th scope="col">
                <button class="btn py-0 fw-bold" wire:click="orderByFirstName">Имя</button>
            </th>
            <th scope="col">
                <button class="btn py-0 fw-bold" wire:click="orderByLastName">Фамилия</button>
            </th>
            <th scope="col">
                <button class="btn py-0 fw-bold" wire:click="orderByPhone">Номер</button>
            </th>
            <th scope="col">
                <button class="btn py-0 fw-bold" wire:click="orderByEmail">Почта</button>
            </th>
            <th scope="col">
                <button class="btn py-0 fw-bold" wire:click="orderByActive">Активен</button>
            </th>
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
                        {{--                            <form action="{{ route('users.activate', ['user' => $user->id]) }}" method="POST">--}}
                        {{--                                @csrf--}}
                        {{--                                <button class="btn py-0 border- border-secondary"--}}
                        {{--                                        type="submit">{{ $user->active ? 'Да' : 'Нет' }}</button>--}}
                        {{--                            </form>--}}
                        <button class="btn py-0 border- border-secondary"
                                type="button" wire:click="activate({{ $user->id }})">{{ $user->active ? 'Да' : 'Нет' }}</button>
                    @endif </td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>

