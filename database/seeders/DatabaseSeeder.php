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

        $this->states();
        $this->categories();
        $this->formation();
        $this->category_formation();
    }

    function states()
    {
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

    function categories()
    {
        $csv2 = fopen(base_path('database/seeders/categories.csv'), "r");

        $firstline = true;
        while (($data = fgetcsv($csv2, 50, ",")) !== FALSE) {
            if (!$firstline) {
                \App\Models\story_category::create([
                    "category" => $data['1'],
                ]);
            }
            $firstline = false;
        }

        fclose($csv2);
    }

    function formation()
    {
        $csv2 = fopen(base_path('database/seeders/formation.csv'), "r");

        $firstline = true;
        while (($data = fgetcsv($csv2, 50, ",")) !== FALSE) {
            if (!$firstline) {
                \App\Models\story_formation::create([
                    "formation" => $data['1'],
                    "status" => "Active"
                ]);
            }
            $firstline = false;
        }

        fclose($csv2);
    }

    function category_formation()
    {
        $csv2 = fopen(base_path('database/seeders/category_formation.csv'), "r");

        $firstline = true;
        while (($data = fgetcsv($csv2, 50, ",")) !== FALSE) {
            if (!$firstline) {
                \App\Models\category_price::create([
                    "amount" => $data['0'],
                    "formation_id" => $data['1'],
                    "category_id" => $data['2'],
                ]);
            }
            $firstline = false;
        }

        fclose($csv2);
    }
}
