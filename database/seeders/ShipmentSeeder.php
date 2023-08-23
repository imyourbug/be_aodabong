<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipments = [
            [
                'name' => 'Shopee Express',
                'fee' => 40000,
            ],
            [
                'name' => 'Ninja Vans',
                'fee' => 30000,
            ],
            [
                'name' => 'Giao hàng tiết kiệm',
                'fee' => 50000,
            ],
        ];

        try {
            foreach ($shipments as $shipment) {
                Shipment::create($shipment);
            }
        } catch (\Throwable $th) {
        }
    }
}
