<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('seed:india', function () {
    $this->info("Fetching Indian states and cities...");
    $response = Illuminate\Support\Facades\Http::get('https://raw.githubusercontent.com/sab99r/Indian-States-And-Districts/master/states-and-districts.json');
    
    if (!$response->successful()) {
        $this->error("Failed to fetch data from GitHub.");
        return;
    }
    
    $data = $response->json();
    if (empty($data['states'])) {
        $this->error("Invalid JSON structure.");
        return;
    }
    
    $country = App\Models\Country::firstOrCreate(
        ['code' => 'IN'],
        ['name' => 'India']
    );
    
    $this->info("Seeding states and cities for India (Country ID: {$country->id})...");
    
    foreach ($data['states'] as $stateData) {
        $stateName = trim($stateData['state']);
        $state = App\Models\State::firstOrCreate([
            'country_id' => $country->id,
            'name' => $stateName
        ]);
        
        $this->line("State: {$stateName}");
        
        foreach ($stateData['districts'] as $cityName) {
            $cityName = trim($cityName);
            App\Models\City::firstOrCreate([
                'state_id' => $state->id,
                'country_id' => $country->id,
                'name' => $cityName
            ]);
        }
    }
    
    $this->info("Success! Seeded all Indian states and cities.");
})->purpose('Seed all Indian states and cities from GitHub database');
