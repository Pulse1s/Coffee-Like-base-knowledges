<div style="overflow-x: auto;">

    <div class="d-flex justify-content-center my-3">
        <div class="col-8">
            <input type="text" class="form-control shadow-none" wire:model="search" placeholder="Введите имя/фамилию">
        </div>
    </div>

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


        @foreach($users->filter(
        function ($value, $key) use($search) {
            if($search)
                return str_contains($value['first_name'], mb_convert_case($search, MB_CASE_TITLE, "UTF-8"))
                or str_contains($value['last_name'], mb_convert_case($search, MB_CASE_TITLE, "UTF-8"));
            else
                return $value;
             }) as $user)

            <tr class="@if($user->active) table-success @else table-danger @endif">
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>+7{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>@if($user->admin) <span class="text-danger">[adm]</span> @else
                        <button class="btn py-0 border- border-secondary"
                                type="button" wire:click="activate({{ $user->id }})">{{ $user->active ? 'Да' : 'Нет' }}</button>
                    @endif </td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>

