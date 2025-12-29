<div>

    @section('metatags')
        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Page Title') }}</title>
        <meta name="description" content="{{ $desc ?? 'default...' }}">
    @endsection

    <div id="carousel" class="carousel slide carousel-fade">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/slider/1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Только оригинальная продукция:</h2>
                    <p>Мы работаем напрямую с официальными дистрибьюторами Apple, чтобы гарантировать подлинность каждого товара. Забудьте о подделках и сомнительном качестве!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider/2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Конкурентные цены:</h2>
                    <p>Мы постоянно мониторим рынок, чтобы предлагать вам лучшие цены на технику Apple. У нас часто бывают акции и специальные предложения.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider/3.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Экспертная консультация:</h2>
                    <p>Наша команда экспертов всегда готова помочь вам с выбором идеального устройства Apple, ответить на ваши вопросы и предложить оптимальные решения. Мы знаем все о каждом продукте!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider/4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Профессиональная поддержка:</h2>
                    <p>Мы оказываем всестороннюю поддержку наших клиентов на всех этапах: от выбора товара до послепродажного обслуживания. Ваше удовлетворение – наш приоритет.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider/5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Удобный интерфейс:</h2>
                    <p>Наш сайт разработан с учетом потребностей пользователей. Легкий поиск, подробные описания товаров, удобная система оформления заказа – все для вашего комфорта.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="advantages">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section-title">
                        <span>Наши преимущества</span>
                    </h2>
                </div>
            </div>

            <div class="row gy-3 items">
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <p>
                            <i class="fas fa-shipping-fast"></i>
                        </p>
                        <p>Прямые поставки от производителей брендов</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <p>
                            <i class="fas fa-cubes"></i>
                        </p>
                        <p>Широкий ассортимент товаров. Более 10 тыс. наименований</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <p>
                            <i class="fas fa-hand-holding-usd"></i>
                        </p>
                        <p>Приятные и конкурентные цены</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <p>
                            <i class="fa-solid fa-user-graduate"></i>
                        </p>
                        <p>Консультации от профессионалов</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @if($hits_products->isNotEmpty())
        <section class="featured-products">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title">
                            <span>Рекомендуемые товары</span>
                        </h2>
                    </div>
                </div>

                <div class="row">

                    @foreach($hits_products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3" wire:key="{{ $product->id }}">
                            @include('incs.product-card')
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    @if($new_products->isNotEmpty())
        <section class="new-products">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title">
                            <span>Новинки</span>
                        </h2>
                    </div>
                </div>

                <div class="owl-carousel owl-theme owl-carousel-full" wire:ignore>
                    @foreach($new_products as $product)
                        <div wire:key="{{ $product->id }}">
                            @include('incs.product-card')
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    <section class="about-us" id="about">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section-title">
                        <span>About Us</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Вселенная Apple у вас под рукой</p>
                    <p>Добро пожаловать в i-shop, ваш надежный интернет-магазин техники Apple в городе Минске! Мы – команда энтузиастов Apple, разделяющих вашу страсть к инновациям, качеству и элегантному дизайну.</p>
                    <p>Наша миссия – сделать мир Apple доступным каждому. Мы предлагаем широкий ассортимент оригинальной техники Apple: от новейших iPhone и iPad до мощных MacBook и iMac. У нас вы найдете все, что нужно для работы, творчества и развлечений.</p>
                </div>
            </div>
        </div>
    </section>

    <iframe id="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.623366362203!2d27.5955966760153!3d53.902897932936355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfb346bb42fd%3A0x5393b63b3c1ff20a!2z0JHQk9Cj0JjQoCwg0LrQvtGA0L_Rg9GBIOKEliA3!5e0!3m2!1sru!2sby!4v1753542654054!5m2!1sru!2sby"
            width="100%" height="450" style="border:0; display: block;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>

@if(session('success'))
    @script
    <script>
        toastr.success('{{ session('success') }}')
    </script>
    @endscript
@endif
