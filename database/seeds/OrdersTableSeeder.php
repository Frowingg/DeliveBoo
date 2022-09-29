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

        $orders = [
            [
                'name' => 'Giacomo',
                'lastname' => 'Rossi',
                'address' => 'Via Roma, 1',
                'quantity' => 1,
                'total_price' => 10,
                'email' => 'Giacomo@email.it',
                'user_id' => rand(1,5)
            ],
            [
                'name' => 'Davide',
                'lastname' => 'Pisani',
                'address' => 'Via Pisani, 10',
                'quantity' => 4,
                'total_price' => 50,
                'email' => 'Davide@email.it',
                'user_id' => rand(1,5)
            ],
            [
                'name' => 'Paolo',
                'lastname' => 'Verdi',
                'address' => 'Via Palermo, 12',
                'quantity' => 2,
                'total_price' => 100,
                'email' => 'Paolo@email.it',
                'user_id' => rand(1,5)
            ]
        ];

        foreach($orders as $order){
            $new_order = new Order();

            $new_order->name = $order['name'];
            $new_order->lastname = $order['lastname'];
            $new_order->address = $order['address'];
            $new_order->quantity = $order['quantity'];
            $new_order->total_price = $order['total_price'];
            $new_order->email = $order['email'];  
            $new_order->user_id = $order['user_id'];          

            
            
            $new_order->save();
            
            //$new_order->dishes()->sync(rand(1,10));
        }


    }
}
