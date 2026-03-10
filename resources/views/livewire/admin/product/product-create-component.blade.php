<div class="row">

    <div class="col-12 mb-4 position-relative">

        <div class="update-loading" wire:loading wire:target="save, category_id">
            <div class="spinner-border" role="status">
                <span class="sr-only">Загрузка...</span>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('admin.products.index') }}" wire:navigate class="btn btn-primary">Список продуктов</a>
            </div>
            <div class="card-body">

                <form wire:submit="save">

                    <div class="mb-3">
                        <label for="title" class="form-label required">Заголовок</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                               placeholder="Заголовок продукта"
                               wire:model="title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label required">Категория</label>
                        <select wire:model.live="category_id" id="category_id"
                                class="custom-select @error('category_id') is-invalid @enderror">
                            <option value="">Выберите категорию</option>
                            {!! \App\Helpers\Category\Category::getMenu('incs.menu-select-tpl') !!}
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        @foreach($this->filters as $k => $filter_group)
                            <div class="col-lg-3 col-md-6" wire:key="{{ $k }}">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">{{ $filter_group[0]->title }}</h6>
                                    </div>
                                    <div class="card-body">
                                        @foreach($filter_group as $filter)
                                            <div wire:key="{{ $filter->filter_id }}">
                                                <input
                                                    type="checkbox"
                                                    wire:model="selectedFilters"
                                                    value="{{ $filter->filter_id }}"
                                                    id="filter-{{ $filter->filter_id }}"
                                                >
                                                <label for="filter-{{ $filter->filter_id }}" class="form-check-label">{{ $filter->filter_title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label required">Цена</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                               placeholder="Цена продукта"
                               wire:model="price">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="old_price" class="form-label">Старая цена</label>
                        <input type="number" class="form-control @error('old_price') is-invalid @enderror" id="old_price"
                               placeholder="Старая цена продукта"
                               wire:model="old_price">
                        @error('old_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="is_hit" class="form-check-label">Хит продаж</label>
                        <input type="checkbox" class="@error('is_hit') is-invalid @enderror" id="is_hit"
                               wire:model="is_hit">
                        @error('is_hit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="is_new" class="form-check-label">Новинка</label>
                        <input type="checkbox" class="@error('is_new') is-invalid @enderror" id="is_new"
                               wire:model="is_new">
                        @error('is_new')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Краткое описание</label>
                        <input type="text" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                               placeholder="Краткое описание продукта"
                               wire:model="excerpt">
                        @error('excerpt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <livewire:admin.file-manager.file-manager-component>
                        <label for="summernote" class="form-label required">Содержание</label>
                        <div wire:ignore>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="summernote" rows="10" placeholder="Содержание продукта"
                                      wire:model="content"></textarea>
                        </div>
                        @error('content')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                               wire:model="image">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div wire:loading wire:target="image">
                            <span class="text-success">Загрузка...</span>
                        </div>

                        @if(!$errors->has('image') && $image && $image->isPreviewable())
                            <p class="text-danger">Нажмите на фотографию, чтобы удалить её.</p>
                            <img
                                src="{{ $image->temporaryUrl() }}"
                                alt=""
                                width="100"
                                wire:click="removeUpload('image', '{{ $image->getFilename() }}')"
                            >
                        @endif

                    </div>

                    <div class="mb-3">
                        <label for="gallery" class="form-label">Галерея</label>
                        <input id="gallery" type="file" class="form-control @error('gallery.*') is-invalid @enderror"
                               wire:model="gallery" placeholder="Галерея" multiple>
                        @error('gallery.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div wire:loading wire:target="gallery">
                            <span class="text-success">Загрузка...</span>
                        </div>

                        @if($gallery)
                            <p class="text-danger">Нажмите на фотографию, чтобы удалить её</p>
                            <div class="mt-2">
                                @foreach($gallery as $photo)
                                    @if($photo->isPreviewable())
                                        <img src="{{ $photo->temporaryUrl() }}" alt="" width="100"
                                             wire:click="removeUpload('gallery', '{{ $photo->getFilename() }}')">
                                    @else
                                        <span class="text-danger">ошибка!</span>
                                    @endif
                                @endforeach
                            </div>

                        @endif
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

@script
<script>

    $(function () {
        $('#summernote').summernote({
            callbacks: {
                onChange: function(contents, $editable) {
                    $wire.$set('content', contents, false)
                }
            },
            height: 300
        });
    });

</script>
@endscript
