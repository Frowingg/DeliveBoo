<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\DishOrder;

class DishOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $dish_ids = [];
        $order_ids = [];

        //Creo un Ordine e un Piatto
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
            array_push($dish_ids, $new_dish->id);
            


            $new_dish = new Order();

            $new_dish->name = $faker->word();
            $new_dish->lastname = $faker->word();
            $new_dish->address = $faker->word(5, true);
            $new_dish->quantity = $faker-> randomNumber(2, false);
            $new_dish->total_price = $faker-> randomNumber(3, false);
            $new_dish->email = $faker->word();  
            $new_dish->user_id = rand(1,7);          

            $new_dish->save();

            
        }


    }
}
