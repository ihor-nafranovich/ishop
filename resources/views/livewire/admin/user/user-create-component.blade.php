<div class="row">

    <div class="col-12 mb-4 position-relative">

        <div class="update-loading" wire:loading wire:target="save">
            <div class="spinner-border" role="status">
                <span class="sr-only">Загрузка...</span>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.users.index') }}" wire:navigate class="btn btn-primary">Список пользователей</a>
            </div>
            <div class="card-body">

                <form wire:submit="save">

                    <div class="mb-3">
                        <label for="name" class="form-label required">Имя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="Имя"
                               wire:model="name">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label required">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                               placeholder="Email"
                               wire:model="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label required">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                               placeholder="Пароль"
                               wire:model="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        Администратор?
                        <label class="switch">
                            <input type="checkbox" wire:model="is_admin">
                            <span class="slider round"></span>
                        </label>
                        @error('is_admin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">
                            Сохранить
                            <div wire:loading wire:target="save" class="spinner-grow spinner-grow-sm" role="status">
                                <span class="visually-hidden">Загрузка...</span>
                            </div>
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>
