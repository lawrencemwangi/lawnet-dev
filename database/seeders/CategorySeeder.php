<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [ 
            'UI/UX design',
            'web development',
            'Intergration services',
            'Database Management',
            'Software development',
            'ICT consultant',
            'Project management',
            'Maintance and Support'
        ];

        foreach($titles as $title)
        {
            Category::create([
                'title' => $title,
                'slug' => str::slug($title),
            ]);
        }
    }
}
