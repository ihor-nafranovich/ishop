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
                        <li><span>Корзина</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-8 mb-3">
                <div class="cart-content p-3 h-100 bg-white">

                    @if($cart = \App\Helpers\Cart\Cart::getCart())
                        <div class="table-responsive position-relative">

                            <div class="update-loading" wire:loading wire:target="updateItemQuanity, removeFromCart, clearCart">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Загрузка...</span>
                                </div>
                            </div>

                            <table class="table align-middle table-hover">
                                <thead class="table-dark">
                                <tr>
                                    <th>Фотография</th>
                                    <th>Наименование</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Итог</th>
                                    <th><i class="fa-regular fa-trash-can"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $id => $item)
                                <tr wire:key="{{ $id }}">
                                    <td class="product-img-td">
                                        <a href="{{ route('product', $item['slug']) }}" wire:navigate>
                                            <img src="{{ asset($item['image']) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product', $item['slug']) }}" class="cart-content-title">
                                            {{ $item['title'] }}
                                        </a>
                                    </td>
                                    <td>{{ $item['price'] }} BYN</td>
                                    <td x-data="{ qty: {{ $item['quantity'] }} }">
                                        <div class="input-group" style="flex-wrap: nowrap;">
                                            <input
                                                type="number"
                                                value="{{ $item['quantity'] }}"
                                                x-model="qty"
                                                class="form-control cart-qty"
                                                min="1"
                                                style="width: 80px;">
                                            <button
                                                class="btn btn-warning"
                                                wire:loading.attr="disabled"
                                                x-on:click="$wire.updateItemQuanity({{ $id }}, qty)"
                                            >
                                                <i class="fa-solid fa-rotate"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>{{ $item['quantity'] * $item['price'] }} BYN</td>
                                    <td>
                                        <button class="btn btn-danger" wire:click="removeFromCart({{ $id }})" wire:loading.attr="disabled" wire:target="removeFromCart">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <button class="btn btn-outline-danger" wire:click="clearCart" wire:loading.attr="disabled" wire:target="clearCart">Очистить корзину</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <p>Корзина пуста...</p>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 mb-3">

                <div class="cart-summary p-3 sidebar">
                    <h5 class="section-title"><span>Информация о корзине</span></h5>

                    <div class="d-flex justify-content-between my-3">
                        <h6>Товары</h6>
                        <h6>{{ \App\Helpers\Cart\Cart::getCartQuantityItems() }}</h6>
                    </div>

                    <div class="d-flex justify-content-between my-3 border-bottom">
                        <h6>Позиции</h6>
                        <h6>{{ \App\Helpers\Cart\Cart::getCartQuantityTotal() }}</h6>
                    </div>

                    <div class="d-flex justify-content-between my-3">
                        <h3>Итого</h3>
                        <h3>{{ \App\Helpers\Cart\Cart::getCartTotal() }} BYN</h3>
                    </div>

                    @if($cart)
                        <div class="d-grid">
                            <a wire:navigate href="{{ route('checkout') }}" class="btn btn-warning">Оформить заказ</a>
                        </div>
                    @endif

                </div>

            </div>

        </div>
    </div>

</div>
