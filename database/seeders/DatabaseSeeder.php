<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\state::truncate();

        $csv = fopen(base_path('database/seeders/states.csv'), "r");

        $firstline = true;
        while (($data = fgetcsv($csv, 50, ",")) !== FALSE) {
            if (!$firstline) {
                \App\Models\state::create([
                    "st_name" => $data['1'],
                    "capital" => $data['2']
                ]);
            }
            $firstline = false;
        }

        fclose($csv);
    }
}
