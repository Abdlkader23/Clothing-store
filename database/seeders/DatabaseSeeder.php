<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use  App\Models\product;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $varieties = [
            ['name' => 'T-Shirts'],
            ['name' => 'Jeans'],
            ['name' => 'Jackets'],
            ['name' => 'Sweaters'],
            ['name' => 'Shorts'],
            ['name' => 'Dresses']
        ];

        DB::table('varieties')->insert($varieties);

        for ($i = 0; $i < 25; $i++) {
            product::create([
                'name' => 'product'.$i,
                'imagpath' =>'', // Replace with a path or URL to a real image if needed
                'description' => 'this is product numder',
                'price' => rand( 10, 100),
                'category_id ' => rand(1, 6),
            ]);
    }
}
}
