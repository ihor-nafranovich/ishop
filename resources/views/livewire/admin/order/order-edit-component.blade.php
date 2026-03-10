<div class="row">

    <div class="col-12 mb-4 position-relative">

        <div class="update-loading" wire:loading>
            <div class="spinner-border" role="status">
                <span class="sr-only">Загрузка...</span>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Заказ #{{ $order->id }} ({{ $order->status ? 'Завершён' : 'Новый' }})
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Имя клиента</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>Email клиента</th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Статус</th>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" wire:model.live="status">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>Итого</th>
                            <td>${{ $order->total }}</td>
                        </tr>
                        <tr>
                            <th>Создано</th>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Обновлено</th>
                            <td>{{ $order->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Примечание</th>
                            <td>{{ $order->note }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Товары заказа
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Изображение</th>
                            <th>Товар</th>
                            <th>Цена</th>
                            <th>Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderProducts as $product)
                            <tr wire:key="{{ $product->id }}">
                                <td><img src="{{ asset($product->image) }}" height="50" alt=""></td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right font-weight-bold">
                                Итого: ${{ $order->total }}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

</div>
