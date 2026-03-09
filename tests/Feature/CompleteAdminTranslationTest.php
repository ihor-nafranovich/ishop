<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CompleteAdminTranslationTest extends TestCase
{
    #[Test]
    public function it_verifies_all_admin_components_are_translated_to_russian()
    {
        $adminComponents = [
            'app/Livewire/Admin/HomeComponent.php' => ['Панель управления'],
            'app/Livewire/Admin/Category/CategoryIndexComponent.php' => ['Категории', 'Ошибка! Категория содержит подкатегории.', 'Ошибка! Категория содержит продукты.', 'Категория удалена', 'Ошибка при удалении категории'],
            'app/Livewire/Admin/Category/CategoryCreateComponent.php' => ['Создать категорию', 'Категория успешно создана', 'Ошибка при сохранении категории'],
            'app/Livewire/Admin/Category/CategoryEditComponent.php' => ['Редактировать категорию', 'Категория успешно обновлена', 'Ошибка при обновлении категории'],
            'app/Livewire/Admin/Product/ProductIndexComponent.php' => ['Продукты', 'Продукт удален', 'Ошибка при удалении продукта'],
            'app/Livewire/Admin/Product/ProductCreateComponent.php' => ['Создать продукт', 'Продукт успешно создан'],
            'app/Livewire/Admin/Product/ProductEditComponent.php' => ['Редактировать продукт', 'Продукт успешно обновлен'],
            'app/Livewire/Admin/Filter/FilterGroupIndexComponent.php' => ['Группы фильтров', 'Группа фильтров удалена', 'Ошибка при удалении группы фильтров'],
            'app/Livewire/Admin/Filter/FilterGroupCreateComponent.php' => ['Создать группу фильтров', 'Группа фильтров успешно создана', 'Ошибка при сохранении группы фильтров'],
            'app/Livewire/Admin/Filter/FilterGroupEditComponent.php' => ['Редактировать группу фильтров', 'Группа фильтров успешно обновлена'],
            'app/Livewire/Admin/Filter/FilterIndexComponent.php' => ['Список фильтров', 'Фильтр удален', 'Ошибка при удалении фильтра'],
            'app/Livewire/Admin/Filter/FilterCreateComponent.php' => ['Создать фильтр', 'Фильтр успешно создан'],
            'app/Livewire/Admin/Filter/FilterEditComponent.php' => ['Редактировать фильтр', 'Фильтр успешно обновлен'],
            'app/Livewire/Admin/Order/OrderIndexComponent.php' => ['Заказы', 'Заказ удален', 'Ошибка при удалении заказа'],
            'app/Livewire/Admin/Order/OrderEditComponent.php' => ['Заказ'],
            'app/Livewire/Admin/User/UserIndexComponent.php' => ['Пользователи', 'Пользователь успешно удален', 'Ошибка при удалении пользователя'],
            'app/Livewire/Admin/User/UserCreateComponent.php' => ['Создать пользователя', 'Пользователь успешно создан'],
            'app/Livewire/Admin/User/UserEditComponent.php' => ['Редактировать пользователя', 'Пользователь успешно обновлен'],
            'app/Livewire/Admin/FileManager/FileManagerComponent.php' => ['Файл успешно загружен'],
        ];

        foreach ($adminComponents as $filePath => $expectedTranslations) {
            $fileContent = file_get_contents(base_path($filePath));
            foreach ($expectedTranslations as $translation) {
                $this->assertStringContainsString(
                    $translation,
                    $fileContent,
                    "Translation '$translation' not found in $filePath"
                );
            }
        }

        $this->assertTrue(true, "All admin components are properly translated to Russian");
    }

    #[Test]
    public function it_verifies_admin_layout_is_translated_to_russian()
    {
        $layoutContent = file_get_contents(base_path('resources/views/components/layouts/admin.blade.php'));

        $expectedTranslations = [
            'Панель управления',
            'Категории',
            'Продукты',
            'Фильтры',
            'Группы фильтров',
            'Добавить группы фильтров',
            'Список фильтров',
            'Добавить фильтры',
            'Заказы',
            'Пользователи',
            'Профиль',
            'Выйти',
            'Готовы выйти?',
            'Нажмите "Выйти" ниже, если вы готовы завершить текущий сеанс',
            'Отмена',
            'Админ панель'
        ];

        foreach ($expectedTranslations as $translation) {
            $this->assertStringContainsString(
                $translation,
                $layoutContent,
                "Layout translation '$translation' not found"
            );
        }

        $this->assertTrue(true, "Admin layout is properly translated to Russian");
    }

    #[Test]
    public function it_verifies_admin_home_view_is_translated_to_russian()
    {
        $viewContent = file_get_contents(base_path('resources/views/livewire/admin/home-component.blade.php'));

        $expectedTranslations = [
            'Продукты',
            'Пользователи',
            'Заказы',
            'Общая сумма заказов'
        ];

        foreach ($expectedTranslations as $translation) {
            $this->assertStringContainsString(
                $translation,
                $viewContent,
                "Home view translation '$translation' not found"
            );
        }

        $this->assertTrue(true, "Admin home view is properly translated to Russian");
    }

    #[Test]
    public function it_verifies_category_sorting_is_translated_to_russian()
    {
        $componentContent = file_get_contents(base_path('app/Livewire/Product/CategoryComponent.php'));
        $viewContent = file_get_contents(base_path('resources/views/livewire/product/category-component.blade.php'));

        $expectedComponentTranslations = [
            'По умолчанию',
            'Название (а-я)',
            'Название (я-а)',
            'Цена (низкая > высокая)',
            'Цена (высокая > низкая)'
        ];

        $expectedViewTranslations = [
            'Сортировать по:',
            'Показать:'
        ];

        foreach ($expectedComponentTranslations as $translation) {
            $this->assertStringContainsString(
                $translation,
                $componentContent,
                "Category component translation '$translation' not found"
            );
        }

        foreach ($expectedViewTranslations as $translation) {
            $this->assertStringContainsString(
                $translation,
                $viewContent,
                "Category view translation '$translation' not found"
            );
        }

        $this->assertTrue(true, "Category sorting is properly translated to Russian");
    }
}