<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\JobOffer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test; 

class JobBoardTest extends TestCase
{
    use RefreshDatabase;

    #[Test] // Nowoczesny sposób oznaczania testu
    public function homepage_displays_job_offers(): void
    {
        $category = Category::create(['name' => 'IT']);
        JobOffer::create([
            'title' => 'Programista PHP',
            'description' => 'Opis pracy',
            'location' => 'Rzeszów',
            'category_id' => $category->id,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Programista PHP');
    }

    #[Test]
    public function search_filter_works_correctly(): void
    {
        $category = Category::create(['name' => 'IT']);
        JobOffer::create([
            'title' => 'Senior Java',
            'description' => 'Opis',
            'location' => 'Kraków',
            'category_id' => $category->id,
        ]);

        $response = $this->get('/?search=Python');

        $response->assertStatus(200);
        $response->assertDontSee('Senior Java');
        $response->assertSee('Nie znaleziono ofert');
    }
}