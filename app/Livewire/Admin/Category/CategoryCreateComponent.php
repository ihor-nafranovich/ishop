<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\FilterGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.admin')]
#[Title('Создать категорию')]
class CategoryCreateComponent extends Component
{

    public string $title;
    public $parent_id = 0;
    public array $selectedCategoryFilters = [];

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
            'parent_id' => 'required|integer',
            'selectedCategoryFilters.*' => 'numeric',
        ]);

        try {
            DB::beginTransaction();
            $category = Category::query()->create($validated);
            if (!empty($validated['selectedCategoryFilters'])) {
                $data = [];
                foreach ($validated['selectedCategoryFilters'] as $category_filter) {
                    $data[] = [
                        'category_id' => $category->id,
                        'filter_group_id' => $category_filter,
                    ];
                }
                DB::table('category_filters')->insert($data);
            }
            DB::commit();
            cache()->forget('categories_html');
            session()->flash('success', 'Категория успешно создана');
            $this->redirectRoute('admin.categories.index', navigate: true);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->js("toastr.error('Ошибка при сохранении категории')");
        }

    }

    public function render()
    {
        $filter_groups = FilterGroup::all();
        return view('livewire.admin.category.category-create-component', compact('filter_groups'));
    }
}
