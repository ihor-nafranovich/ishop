<?php

namespace Tests\Feature;

use App\Livewire\Product\CategoryComponent;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CategorySortingTest extends TestCase
{
    #[Test]
    public function it_displays_sorting_options_in_russian()
    {
        $component = Livewire::test(CategoryComponent::class, ['slug' => 'laptop']);

        $sortList = $component->instance()->sortList;

        $this->assertEquals('По умолчанию', $sortList['default']['title']);
        $this->assertEquals('Название (а-я)', $sortList['name-asc']['title']);
        $this->assertEquals('Название (я-а)', $sortList['name-desc']['title']);
        $this->assertEquals('Цена (низкая > высокая)', $sortList['price-asc']['title']);
        $this->assertEquals('Цена (высокая > низкая)', $sortList['price-desc']['title']);

        $this->assertTrue(true, "All sorting labels are in Russian");
    }
}
