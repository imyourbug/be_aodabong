<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
                'customer_id' => 1,
                'status' => 0,
                'discount' => 5
            ],
            [
                'customer_id' => 2,
                'status' => 1,
                'discount' => 6
            ],
            [
                'customer_id' => 3,
                'status' => 2,
                'discount' => 7
            ],
            [
                'customer_id' => 4,
                'status' => 3,
                'discount' => 8
            ],
            [
                'customer_id' => 5,
                'status' => 1,
                'discount' => 9
            ],
            [
                'customer_id' => 6,
                'status' => 2,
                'discount' => 10
            ]
        ];

        try {
            foreach ($orders as $order) {
                Order::create($order);
            }
        } catch (\Throwable $th) {
        }
    }
}
