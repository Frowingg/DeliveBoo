<?php

use Illuminate\Database\Seeder;
use App\Admin\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach($dishes as $dish) {

            $new_dish = new Dish();

            $new_dish->name = $dish['name'];
            $new_dish->description = $dish['description'];
            $new_dish->ingredients = $dish['ingredients'];
            $new_dish->price = $dish['price'];
            $new_dish->available = $dish['available'];
            $new_dish->dish_cover = $dish['dish_cover'];
            $new_dish->user_id = 1;
            
            $new_dish->save();
        }
    }
}
