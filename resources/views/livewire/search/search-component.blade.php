<div>

    @section('metatags')

        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Заголовок страницы') }}</title>
        <meta name="description" content="{{ $desc ?? '' }}">

    @endsection

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumbs" id="products">
                    <ul>
                        <li><a href="{{ route('home') }}" wire:navigate>Главная</a></li>
                        <li><span>Результаты поиска</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container position-relative">

        <div class="update-loading" wire:loading wire:target.except="add2Cart">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Загрузка...</span>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">

                <h1 class="h3"><span>Поиск: <em>{{ $query }}</em></span></h1>

                @if(count($products))

                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-sm-6 mb-3" wire:key="{{ $product->id }}">
                                @include('incs.product-card')
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {{ $products->links(data: ['scrollTo' => '#products']) }}
                        </div>
                    </div>
                @else
                    <p>Товары не найдены...</p>
                @endif

            </div>
        </div>
    </div>
</div>

