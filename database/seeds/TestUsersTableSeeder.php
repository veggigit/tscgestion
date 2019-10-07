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
            ['name' => 'Esteban Cajina','email' => 'estebancajina@gmail.com'],
            ['name' => 'Esteban Cajina', 'email' => 'estebancajina@devmind.cl'],
            ['name' => 'Carlos Marfull', 'email' => 'carlos.marfull@tusindicatoconsorcio.cl'],
            ['name' => 'Pamela Walters', 'email' => 'pamela.walters@tusindicatoconsorcio.cl']
        ]);
    }
}
