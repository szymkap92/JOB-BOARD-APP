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

    #[Test]
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

    #[Test]
    public function search_finds_by_description(): void
    {
        $category = Category::create(['name' => 'IT']);
        JobOffer::create([
            'title' => 'Developer',
            'description' => 'Wymagana znajomość Laravel i PHP',
            'location' => 'Rzeszów',
            'category_id' => $category->id,
        ]);

        $response = $this->get('/?search=Laravel');

        $response->assertStatus(200);
        $response->assertSee('Developer');
    }

    #[Test]
    public function location_filter_works(): void
    {
        $category = Category::create(['name' => 'IT']);
        JobOffer::create([
            'title' => 'Oferta Kraków',
            'description' => 'Opis',
            'location' => 'Kraków',
            'category_id' => $category->id,
        ]);
        JobOffer::create([
            'title' => 'Oferta Warszawa',
            'description' => 'Opis',
            'location' => 'Warszawa',
            'category_id' => $category->id,
        ]);

        $response = $this->get('/?location=Kraków');

        $response->assertStatus(200);
        $response->assertSee('Oferta Kraków');
        $response->assertDontSee('Oferta Warszawa');
    }

    #[Test]
    public function category_filter_works(): void
    {
        $it = Category::create(['name' => 'IT']);
        $marketing = Category::create(['name' => 'Marketing']);

        JobOffer::create([
            'title' => 'PHP Developer',
            'description' => 'Opis',
            'location' => 'Rzeszów',
            'category_id' => $it->id,
        ]);
        JobOffer::create([
            'title' => 'Social Media Manager',
            'description' => 'Opis',
            'location' => 'Rzeszów',
            'category_id' => $marketing->id,
        ]);

        $response = $this->get('/?category=' . $it->id);

        $response->assertStatus(200);
        $response->assertSee('PHP Developer');
        $response->assertDontSee('Social Media Manager');
    }

    #[Test]
    public function job_detail_page_displays_offer(): void
    {
        $category = Category::create(['name' => 'IT']);
        $job = JobOffer::create([
            'title' => 'Laravel Developer',
            'description' => 'Szczegółowy opis stanowiska',
            'location' => 'Wrocław',
            'category_id' => $category->id,
        ]);

        $response = $this->get('/jobs/' . $job->id);

        $response->assertStatus(200);
        $response->assertSee('Laravel Developer');
        $response->assertSee('Wrocław');
        $response->assertSee('Szczegółowy opis stanowiska');
    }

    #[Test]
    public function combined_filters_narrow_results(): void
    {
        $it = Category::create(['name' => 'IT']);
        $marketing = Category::create(['name' => 'Marketing']);

        JobOffer::create([
            'title' => 'PHP Developer',
            'description' => 'Praca z Laravel',
            'location' => 'Rzeszów',
            'category_id' => $it->id,
        ]);
        JobOffer::create([
            'title' => 'PHP Developer',
            'description' => 'Praca z Symfony',
            'location' => 'Kraków',
            'category_id' => $it->id,
        ]);

        $response = $this->get('/?search=PHP&location=Rzeszów&category=' . $it->id);

        $response->assertStatus(200);
        $response->assertSee('Praca z Laravel');
        $response->assertDontSee('Praca z Symfony');
    }
}
