<div class="row">

    <div class="col-12 mb-4 position-relative">

        <div class="update-loading" wire:loading>
            <div class="spinner-border" role="status">
                <span class="sr-only">Загрузка...</span>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.users.create') }}" wire:navigate class="btn btn-primary">Добавить пользователя</a>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Админ</th>
                            <th>Создан</th>
                            <th>Обновлён</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr wire:key="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-circle" wire:navigate>
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    @if(auth()->id() != $user->id)
                                        <button class="btn btn-danger btn-circle" wire:click="deleteUser({{ $user->id }})" wire:confirm="Вы уверены?" wire:loading.attr="disabled">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

                {{ $users->links() }}

            </div>
        </div>

    </div>

</div>
