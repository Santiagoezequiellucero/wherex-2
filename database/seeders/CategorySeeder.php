<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    
    public function run()
    {
        $categories = [
            [
                'name'=>'celulares y tablets ',
                'slug'=> Str::slug('celulares y tablets'),
                'icon'=> '<i class="fas fa-mobile-alt"></i>'

            ],
            [
                'name'=>'TV, audio y video ',
                'slug'=> Str::slug('TV, audio y video'),
                'icon'=>'<i class="fas fa-tv"></i>'

            ],
            [
                'name'=>'Consola y videojuegos ',
                'slug'=> Str::slug('Consola y videojuegos'),
                'icon'=>'<i class="fas fa-gamepad"></i>'

            ],
            [
                'name'=>'Computación',
                'slug'=> Str::slug('Computación'),
                'icon'=>'<i class="fas fa-laptop"></i>'

            ],
            [
                'name'=>'Moda',
                'slug'=> Str::slug('Moda'),
                'icon'=>'<i class="fas fa-tshirt"></i>'

            ],
            
        ];

        foreach($categories as $category){
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
