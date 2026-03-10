<div>

    @section('metatags')

        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Заголовок страницы') }}</title>
        <meta name="description" content="{{ $desc ?? '' }}">

    @endsection

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumbs">
                    <ul>
                        <li><a wire:navigate href="{{ route('home') }}">Домашняя</a></li>
                        <li><a wire:navigate href="{{ route('account') }}">Учетная запись</a></li>
                        <li><span>Изменить учетную запись</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row">

            <div class="col-lg-4 mb-3">
                <div class="cart-summary p-3 sidebar">
                    <h5 class="section-title"><span>Ссылка</span></h5>
                    @include('incs.account-links')
                </div>
            </div>

            <div class="col-lg-8 mb-3">
                <div class="cart-content p-3 h-100 bg-white">
                    <h5 class="section-title"><span>Изменить учетную запись</span></h5>

                    <form wire:submit="save">

                        <div class="mb-3">
                            <label for="name" class="form-label required">Имя</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" placeholder="Имя" wire:model="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" placeholder="Email" wire:model="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label required">Пароль</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                   placeholder="Пароль" wire:model="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning">
                                Сохранить
                                <div wire:loading wire:target="save">
                                    <div class="spinner-grow spinner-grow-sm" role="status">
                                        <span class="visually-hidden">Загрузка...</span>
                                    </div>
                                </div>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>


