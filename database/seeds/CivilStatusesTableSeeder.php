<?php

use Illuminate\Database\Seeder;
use App\CivilStatus;

class CivilStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CivilStatus::insert([
            ['name' => 'Soltero/a'],
            ['name' => 'Casado/a'],
            ['name' => 'Divorciado/a'],
            ['name' => 'Viudo/a'],
        ]);
    }
}
