<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ShipmentSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(VoucherSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ProductDetailSeeder::class);
        $this->call(CommentSeeder::class);
        // $this->call(SocialSeeder::class);
    }
}
