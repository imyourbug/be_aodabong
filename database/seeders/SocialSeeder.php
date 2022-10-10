<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [
            [
                'user_id' => 1,
                'provider_user_id' => '118162473771899746612',
                'name' => 'Dương Văn Khải',
            ]
        ];

        try {
            foreach ($socials as $social) {
                Social::create($social);
            }
        } catch (\Throwable $th) {
        }
    }
}
