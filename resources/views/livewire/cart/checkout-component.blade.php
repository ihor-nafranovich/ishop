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
                        <li><span>Оформление заказа</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">

        @if($cart = \App\Helpers\Cart\Cart::getCart())

                <div class="row">

                    <div class="col-lg-8 mb-3">
                        <div class="Checkout p-3 h-100 bg-white">

                            <h1 class="section-title h5"><span>Оформление заказа</span></h1>

                            <form wire:submit="saveOrder">

                                @guest

                                    <div class="mb-3">
                                        <label for="name" class="form-label required">Имя</label>
                                        <input type="text" id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Иванов Иван" aria-label="Имя" wire:model="name">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label required">Электронный адрес</label>
                                        <input type="email" id="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="....@mail.com" aria-label="Email" wire:model="email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                @endguest

                                <div class="mb-3">
                                    <label for="note" class="form-label">Примечание</label>
                                    <textarea class="form-control @error('note') is-invalid @enderror" id="note"
                                              rows="5"
                                              placeholder="Добавьте номер телефона для быстрого ответа" wire:model="note"></textarea>
                                    @error('note')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-warning">
                                        Заказать
                                        <div wire:loading wire:target="saveOrder">
                                            <div class="spinner-grow spinner-grow-sm" role="status">
                                                <span class="visually-hidden">Загрузка...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">

                        <div class="cart-summary p-3 sidebar">
                            <h5 class="section-title"><span>Итог корзины</span></h5>

                            <ul class="list-unstyled">
                                @foreach($cart as $k => $item)

                                    <li wire:key="{{ $k }}" class="d-flex justify-content-between my-3">
                                        <span class="fw-medium">{{ $item['title'] }}</span>
                                        <span>{{ $item['quantity'] }} x {{ $item['price'] }}</span>
                                    </li>

                                @endforeach
                            </ul>

                            <div class="d-flex justify-content-between pt-3 border-top">
                                <h3>Итого</h3>
                                <h3>{{ \App\Helpers\Cart\Cart::getCartTotal() }} BYN</h3>
                            </div>

                        </div>

                    </div>

                </div>
        @else
            <p>Корзина пуста...</p>
        @endif
    </div>

</div>
