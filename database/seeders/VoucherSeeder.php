<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vouchers = [
            [
                'name' => 'Khuyến mãi 5%',
                'discount' => 5,
                'active' => 1
            ],
            [
                'name' => 'Khuyến mãi 6%',
                'discount' => 6,
                'active' => 1
            ],
            [
                'name' => 'Khuyến mãi 7%',
                'discount' => 7,
                'active' => 1
            ],
            [
                'name' => 'Khuyến mãi 8%',
                'discount' => 8,
                'active' => 1
            ],
            [
                'name' => 'Khuyến mãi 9%',
                'discount' => 9,
                'active' => 1
            ],
            [
                'name' => 'Khuyến mãi 10%',
                'discount' => 10,
                'active' => 1
            ],
        ];

        try {
            foreach ($vouchers as $voucher) {
                Voucher::create($voucher);
            }
        } catch (\Throwable $th) {
        }
    }
}
