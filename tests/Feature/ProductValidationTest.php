<?php

namespace Tests\Feature;

use App\Livewire\Admin\Product\ProductCreateComponent;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductValidationTest extends TestCase
{

    #[Test]
    public function it_accepts_common_image_formats_for_product_image()
    {
        Storage::fake('public');

        // Test the most common image formats that should work
        $imageFormats = [
            'jpg' => UploadedFile::fake()->image('test.jpg'),
            'jpeg' => UploadedFile::fake()->image('test.jpeg'),
            'png' => UploadedFile::fake()->image('test.png'),
            'webp' => UploadedFile::fake()->image('test.webp'),
            'gif' => UploadedFile::fake()->image('test.gif'),
        ];

        foreach ($imageFormats as $format => $file) {
            Livewire::test(ProductCreateComponent::class)
                ->set('title', 'Test Product')
                ->set('category_id', 1)
                ->set('price', 100)
                ->set('content', 'Test content')
                ->set('image', $file)
                ->call('save')
                ->assertHasNoErrors(['image']);

            $this->assertTrue(true, "Validation passed for {$format} format");
        }
    }

    #[Test]
    public function it_accepts_common_image_formats_for_product_gallery()
    {
        Storage::fake('public');

        $galleryImages = [
            UploadedFile::fake()->image('gallery1.jpg'),
            UploadedFile::fake()->image('gallery2.png'),
            UploadedFile::fake()->image('gallery3.webp'),
        ];

        Livewire::test(ProductCreateComponent::class)
            ->set('title', 'Test Product')
            ->set('category_id', 1)
            ->set('price', 100)
            ->set('content', 'Test content')
            ->set('gallery', $galleryImages)
            ->call('save')
            ->assertHasNoErrors(['gallery.*']);

        $this->assertTrue(true, "Gallery validation passed for mixed formats");
    }

    #[Test]
    public function it_rejects_invalid_file_formats()
    {
        Storage::fake('public');

        $invalidFile = UploadedFile::fake()->create('test.txt', 100, 'text/plain');

        Livewire::test(ProductCreateComponent::class)
            ->set('title', 'Test Product')
            ->set('category_id', 1)
            ->set('price', 100)
            ->set('content', 'Test content')
            ->set('image', $invalidFile)
            ->call('save')
            ->assertHasErrors(['image']);

        $this->assertTrue(true, "Invalid format correctly rejected");
    }
}