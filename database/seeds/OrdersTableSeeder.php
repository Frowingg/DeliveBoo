<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $orders = [
            [
                'name' => 'Giacomo',
                'lastname' => 'Rossi',
                'address' => 'Via Roma, 1',
                'total_price' => 10,
                'email' => 'Giacomo@email.it',
                'user_id' => 1
            ],
            [
                'name' => 'Davide',
                'lastname' => 'Pisani',
                'address' => 'Via Pisani, 10',
                'total_price' => 50,
                'email' => 'Davide@email.it',
                'user_id' => 1
            ],
            [
                'name' => 'Paolo',
                'lastname' => 'Verdi',
                'address' => 'Via Palermo, 12',
                'total_price' => 100,
                'email' => 'Paolo@email.it',
                'user_id' => 1
            ]
        ];

        foreach($orders as $order){
            $new_order = new Order();
            $new_order->name = $order['name'];
            $new_order->lastname = $order['lastname'];
            $new_order->address = $order['address'];
            $new_order->total_price = $order['total_price'];
            $new_order->email = $order['email'];  
            $new_order->user_id = $order['user_id'];          

            $new_order->save();
        }


    }
}
