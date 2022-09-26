<?php

use Illuminate\Database\Seeder;
use App\Category;
// use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'italiana',
            'cinese',
            'giapponese',
            'indiana',
            'araba',
            'messicana'
        ];

        foreach($categories as $category) {
            $new_category = new Category(); 
            $new_category->name = $category;
            // $new_category->slug = Str::slug( $new_category->name, '-');
            $new_category->save();
        }
    }
}
