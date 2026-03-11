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
                        <li><a wire:navigate href="{{ route('orders') }}">Заказы</a></li>
                        <li><span>Заказ</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container position-relative">

        <div class="update-loading" wire:loading>
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Загрузка...</span>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 mb-3">
                <div class="cart-summary p-3 sidebar">
                    <h5 class="section-title"><span>Ссылка</span></h5>
                    @include('incs.account-links')
                </div>
            </div>

            <div class="col-lg-8 mb-3">
                <div class="cart-content p-3 h-100 bg-white">
                    <h5 class="section-title"><span>Заказ #{{ $order->id }}</span></h5>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Продукт</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Итог</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderProducts as $product)
                                <tr wire:key="{{ $product->id }}">
                                    <td><img src="{{ asset($product->image) }}" alt=""></td>
                                    <td><a href="{{ route('product', $product->slug) }}" wire:navigate>{{ $product->title }}</a></td>
                                    <td>{{ $product->price }} BYN</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price * $product->quantity }} BYN</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="5" class="text-end">Итого: {{ $order->total }} BYN</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    @if($order->note)
                        <p><strong>Примечание:</strong> {{ $order->note }}</p>
                    @endif

                </div>
            </div>

        </div>
    </div>

</div>



