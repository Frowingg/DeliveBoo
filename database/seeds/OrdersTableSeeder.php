<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
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
