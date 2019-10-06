<?php

use Illuminate\Database\Seeder;
use App\PartnerStatus;

class PartnerStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerStatus::insert([

            ['name' => 'active'],
            ['name' => 'inactive']

        ]);
    }
}
