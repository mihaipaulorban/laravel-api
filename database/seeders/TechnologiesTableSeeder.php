<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $technologies = ['Laravel', 'Vue', 'SCSS', 'HTML', 'Javascript', 'Vite', 'SQL'];
        foreach ($technologies as $technology) {
            Technology::create(['name' => $technology]);
        }
    }
}
