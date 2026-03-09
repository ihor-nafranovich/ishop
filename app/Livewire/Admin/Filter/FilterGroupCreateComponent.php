<?php

namespace App\Livewire\Admin\Filter;

use App\Models\FilterGroup;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.admin')]
#[Title('Создать группу фильтров')]
class FilterGroupCreateComponent extends Component
{

    public string $title;

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
        ]);

        try {
            FilterGroup::query()->create($validated);
            session()->flash('success', 'Группа фильтров успешно создана');
            $this->redirectRoute('admin.filter-groups.index', navigate: true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->js("toastr.error('Ошибка при сохранении группы фильтров')");
        }
    }

    public function render()
    {
        return view('livewire.admin.filter.filter-group-create-component');
    }
}
