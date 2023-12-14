<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Sedan', 
            'SUV', 
            'Minivan', 
            'Sport', 
            'Classic', 
            'Coupe', 
            'Luxury',
            'Hatchback',
            'Convertible'
        ];

        foreach ($data as $value) {
            category::insert([
                'name' => $value
            ]);
        }
    }
}
