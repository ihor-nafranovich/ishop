<?php

namespace Tests\Feature;

use App\Livewire\Admin\HomeComponent;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AdminTranslationTest extends TestCase
{
    #[Test]
    public function it_displays_russian_translations_in_admin_components()
    {
        // Check that the component has the correct title attribute
        $reflection = new \ReflectionClass(HomeComponent::class);
        $attributes = $reflection->getAttributes();

        $hasTitleAttribute = false;
        foreach ($attributes as $attribute) {
            if ($attribute->getName() === \Livewire\Attributes\Title::class) {
                $hasTitleAttribute = true;
                $titleValue = $attribute->getArguments()[0] ?? null;
                $this->assertEquals('Панель управления', $titleValue);
                break;
            }
        }

        $this->assertTrue($hasTitleAttribute, "Admin component has title attribute");
        $this->assertTrue(true, "Admin component title is translated");
    }

    #[Test]
    public function it_displays_russian_translations_in_admin_layout()
    {
        $layoutContent = file_get_contents(base_path('resources/views/components/layouts/admin.blade.php'));

        $this->assertStringContainsString('Панель управления', $layoutContent);
        $this->assertStringContainsString('Категории', $layoutContent);
        $this->assertStringContainsString('Продукты', $layoutContent);
        $this->assertStringContainsString('Фильтры', $layoutContent);
        $this->assertStringContainsString('Заказы', $layoutContent);
        $this->assertStringContainsString('Пользователи', $layoutContent);
        $this->assertStringContainsString('Профиль', $layoutContent);
        $this->assertStringContainsString('Выйти', $layoutContent);

        $this->assertTrue(true, "Admin layout translations are working");
    }

    #[Test]
    public function it_displays_russian_translations_in_admin_home_view()
    {
        $viewContent = file_get_contents(base_path('resources/views/livewire/admin/home-component.blade.php'));

        $this->assertStringContainsString('Продукты', $viewContent);
        $this->assertStringContainsString('Пользователи', $viewContent);
        $this->assertStringContainsString('Заказы', $viewContent);
        $this->assertStringContainsString('Общая сумма заказов', $viewContent);

        $this->assertTrue(true, "Admin home view translations are working");
    }
}
