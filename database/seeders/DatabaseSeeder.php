<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminPassword = env('ADMIN_PASSWORD');

        if (blank($adminPassword)) {
            $adminPassword = Str::random(16);

            $this->command?->warn('ADMIN_PASSWORD is not set. Generated admin password: '.$adminPassword);
        }

        User::query()->updateOrCreate(['email' => $adminEmail], [
            'name' => 'Admin',
            'password' => $adminPassword,
        ]);

        $it = Category::create(['name' => 'IT']);
        $marketing = Category::create(['name' => 'Marketing']);
        $finanse = Category::create(['name' => 'Finanse']);
        $administracja = Category::create(['name' => 'Administracja']);
        $sprzedaz = Category::create(['name' => 'Sprzedaż']);

        JobOffer::create([
            'title' => 'PHP Developer',
            'description' => '<p>Poszukujemy doświadczonego programisty PHP do pracy nad aplikacjami webowymi w Laravel. Wymagana znajomość MySQL, REST API oraz podstaw frontendowych (HTML, CSS, JavaScript).</p><p><strong>Oferujemy:</strong> elastyczny czas pracy, pracę zdalną, szkolenia.</p>',
            'location' => 'Rzeszów',
            'category_id' => $it->id,
        ]);

        JobOffer::create([
            'title' => 'Full Stack Developer',
            'description' => '<p>Szukamy Full Stack Developera ze znajomością Vue.js/React oraz PHP (Laravel lub Symfony). Będziesz odpowiedzialny za rozwój platformy e-commerce.</p><p><strong>Wymagania:</strong> min. 2 lata doświadczenia, znajomość Git, Docker.</p>',
            'location' => 'Kraków',
            'category_id' => $it->id,
        ]);

        JobOffer::create([
            'title' => 'Junior Frontend Developer',
            'description' => '<p>Zapraszamy osoby początkujące ze znajomością HTML, CSS i JavaScript. Mile widziana znajomość React lub Vue.js. Zapewniamy mentoring i możliwość rozwoju.</p>',
            'location' => 'Warszawa',
            'category_id' => $it->id,
        ]);

        JobOffer::create([
            'title' => 'Specjalista ds. Social Media',
            'description' => '<p>Poszukujemy kreatywnej osoby do prowadzenia profili firmowych w mediach społecznościowych. Wymagana znajomość Facebook Ads, Instagram oraz narzędzi analitycznych.</p>',
            'location' => 'Wrocław',
            'category_id' => $marketing->id,
        ]);

        JobOffer::create([
            'title' => 'Księgowy/Księgowa',
            'description' => '<p>Firma produkcyjna poszukuje osoby na stanowisko księgowego. Wymagana znajomość przepisów podatkowych, obsługa programów księgowych (Optima, SAP).</p><p><strong>Oferujemy:</strong> stabilne zatrudnienie, pakiet benefitów.</p>',
            'location' => 'Rzeszów',
            'category_id' => $finanse->id,
        ]);

        JobOffer::create([
            'title' => 'Asystent/ka Biura',
            'description' => '<p>Poszukujemy osoby do wsparcia pracy biura. Zakres obowiązków: obsługa korespondencji, organizacja spotkań, prowadzenie dokumentacji. Wymagana dobra znajomość pakietu MS Office.</p>',
            'location' => 'Sędziszów Małopolski',
            'category_id' => $administracja->id,
        ]);

        JobOffer::create([
            'title' => 'Przedstawiciel Handlowy',
            'description' => '<p>Dołącz do naszego zespołu sprzedażowego! Szukamy energicznej osoby z doświadczeniem w sprzedaży B2B. Oferujemy atrakcyjny system prowizyjny, samochód służbowy i telefon.</p>',
            'location' => 'Podkarpackie',
            'category_id' => $sprzedaz->id,
        ]);

        JobOffer::create([
            'title' => 'DevOps Engineer',
            'description' => '<p>Poszukujemy inżyniera DevOps ze znajomością Docker, Kubernetes, CI/CD (GitLab/GitHub Actions). Doświadczenie z AWS lub Azure mile widziane.</p><p><strong>Stack:</strong> Linux, Terraform, Ansible, monitoring (Grafana, Prometheus).</p>',
            'location' => 'Zdalnie',
            'category_id' => $it->id,
        ]);
    }
}
