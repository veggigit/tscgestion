<?php

use App\TestUser;
use Illuminate\Database\Seeder;

class TestUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestUser::insert([
            ['name' => 'Esteban G.','email' => 'estebancajina@gmail.com'],
            ['name' => 'Esteban D.', 'email' => 'estebancajina@devmind.cl'],
            ['name' => 'Esteban P.', 'email' => 'admindpmas@protonmail.com']
        ]);
    }
}
