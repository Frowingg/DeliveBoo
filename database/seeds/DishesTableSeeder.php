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
        $dishes = [
            [
                'name' => 'Pasta al sugo',
                'description' => 'Pasta al sugo buono',
                'ingredients' => 'Pasta Olio ',
                'price' => 20,
                'available' => 1,
                'dish_cover' => ''
            ],
            [
                'name' => 'Pasta all\'olio',
                'description' => 'Pasta all\'olio',
                'ingredients' => 'Pasta Olio',
                'price' => 15,
                'available' => 0,
                'dish_cover' => ''
            ],         
            [
                'name' => 'Pasta al tonno',
                'description' => 'Pasta al tonno appena pescato',
                'ingredients' => 'Pasta tonno ',
                'price' => 100,
                'available' => 0,
                'dish_cover' => ''
            ],
            [
                'name' => 'Pasta al pesto',
                'description' => 'Pasta al pesto',
                'ingredients' => 'Pasta pesto ',
                'price' => 50,
                'available' => 1,
                'dish_cover' => ''
            ],
            [
                'name' => 'Patatine Fritte',
                'description' => 'Patatine super fritte',
                'ingredients' => 'patate ',
                'price' => 4,
                'available' => 1,
                'dish_cover' => ''
            ],            
            [
                'name' => 'Panzetorri',
                'description' => 'Panzerotto ripeno di pomodoro e mozzarella',
                'ingredients' => 'pomodoro mozzarella',
                'price' => 5,
                'available' => 1,
                'dish_cover' => ''            
            ],
            [
                'name' => 'Crocchette di patate ',
                'description' => 'crocchetta di patate con menta ',
                'ingredients' => 'patata menta ',
                'price' => 30,
                'available' => 1,
                'dish_cover' => ''
            ],            
            [
                'name' => 'Arancina',
                'description' => 'Gustosa artancina al ragù',
                'ingredients' => 'riso mozzarella ragù piselli ',
                'price' => 60,
                'available' => 1,
                'dish_cover' => ''
            ],  
        ];

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
