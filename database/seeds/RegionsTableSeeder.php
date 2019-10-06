<?php

use Illuminate\Database\Seeder;
use App\Region;
use Illuminate\Support\Carbon;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::insert([
            ['name' => '1 Región'],
            ['name' => '2 Región'],
            ['name' => '3 Región'],
            ['name' => '4 Región'],
            ['name' => '5 Región'],
            ['name' => 'R.M.'],
            ['name' => '6 Región'],
            ['name' => '7 Región'],
            ['name' => '8 Región'],
            ['name' => '9 Región'],
            ['name' => '10 Región'],
            ['name' => '11 Región'],
            ['name' => '12 Región']
            ]);
    }
}
