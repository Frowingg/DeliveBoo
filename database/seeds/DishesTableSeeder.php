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
        $dishes = [
            [
            'name' => 'Pasta al sugo',
            'description' => 'Pasta al sugo buono',
            'ingredients' => 'Pasta Olio ',
            'price' => 20,
            'available' => 1,
            'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
            ],

            [
                'name' => 'Pasta al pomodoro',
                'description' => 'Pasta al pomodoro fresco',
                'ingredients' => 'Pasta pomodoro ',
                'price' => 30,
                'available' => 1,
                'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
            ],

            [
                'name' => 'Pasta all\'olio',
                'description' => 'Pasta all\'olio',
                'ingredients' => 'Pasta Olio',
                'price' => 15,
                'available' => 0,
                'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
            ],
            
            [
                'name' => 'Pasta al tonno',
                'description' => 'Pasta al tonno appena pescato',
                'ingredients' => 'Pasta tonno ',
                'price' => 100,
                'available' => 0,
                'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
            ],

            [
                'name' => 'Pasta al pesto',
                'description' => 'Pasta al pesto',
                'ingredients' => 'Pasta pesto ',
                'price' => 50,
                'available' => 1,
                'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
            ],
            [
                'name' => 'Patatine Fritte',
                'description' => 'Patatine super fritte',
                'ingredients' => 'patate ',
                'price' => 4,
                'available' => 1,
                'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
                ],
            
                [
                    'name' => 'Panzetorri',
                    'description' => 'Panzerotto ripeno di pomodoro e mozzarella',
                    'ingredients' => 'pomodoro mozzarella',
                    'price' => 5,
                    'available' => 1,
                    'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
                ],
            
                [
                    'name' => 'Crocchette di patate ',
                    'description' => 'crocchetta di patate con menta ',
                    'ingredients' => 'patata menta ',
                    'price' => 30,
                    'available' => 1,
                    'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
                ],
            
                [
                    'name' => 'Arancina',
                    'description' => 'Gustosa artancina al ragù',
                    'ingredients' => 'riso mozzarella ragù piselli ',
                    'price' => 60,
                    'available' => 1,
                    'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
                ],
            
                [
                    'name' => 'cazzo con le patate',
                    'description' => 'un bel cazzo con le patate ',
                    'ingredients' => 'Cazzo Patate ',
                    'price' => 666,
                    'available' => 1,
                    'dish_cover' => 'dish-covers/piatto_vuoto.jpg'
                ],
                [
                    'name' => 'pizza diavola',
                    'description' => 'pizza con salame piccante',
                    'ingredients' => 'salame piccante, mozzarella, pomodoro',
                    'price' => 8,
                    'available' => 1,
                    'dish_cover' => 'dish_cover/piatto_vuoto.jpg'
                ],
                [
                    'name' => 'pizza margherita',
                    'description' => 'pizza con mozzarella',
                    'ingredients' => 'mozzarella, pomodoro, basilico',
                    'price' => 6,
                    'available' => 1,
                    'dish_cover' => 'dish_cover/piatto_vuoto.jpg'
                ],
                [
                    'name' => 'pizza crostino',
                    'description' => 'pizza con prosciutto cotto e mozzarella',
                    'ingredients' => 'prosciutto cotto, mozzarella',
                    'price' => 7,
                    'available' => 1,
                    'dish_cover' => 'dish_cover/piatto_vuoto.jpg'
                ],
                [
                    'name' => 'pizza 4 formaggi',
                    'description' => 'pizza con 4 formaggi diversi ',
                    'ingredients' => 'fontina, grana padano, scamorza, gorgonzola',
                    'price' => 9,
                    'available' => 0,
                    'dish_cover' => 'dish_cover/piatto_vuoto.jpg'
                ],
                [
                    'name' => 'pizza 4 carbonara',
                    'description' => 'pizza con carbonara',
                    'ingredients' => 'uova, guanciale, pecorino, pepe',
                    'price' => 10,
                    'available' => 1,
                    'dish_cover' => 'dish_cover/piatto_vuoto.jpg'
                ]

            



        ];

        foreach($dishes as $dish){

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
