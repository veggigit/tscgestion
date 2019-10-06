<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = (new FastExcel)->import(__DIR__.'/data_excel/users.xlsx', function ($line) {
            return User::insert([
                'name' => $line['name'],
                'email' => $line['email'],
                'email_verified_at' => now(),
                'password' => bcrypt($line['password']),
                'role_id' => $line['role_id'],
                'created_at' => now()
            ]);
        });
    }
}
