<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Admin\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_dish = new Dish();

            $new_dish->name = $faker->word();
            $new_dish->description = $faker->word(8, true);
            $new_dish->ingredients = $faker->word(8, true);
            $new_dish->price = $faker-> randomNumber(3, false);
            $new_dish->available = rand(0,1);
            $new_dish->dish_cover = 'dish-covers/piatto_vuoto.jpg';
            $new_dish->user_id = rand(1,7);

            $new_dish->save();

        }
    }
}
