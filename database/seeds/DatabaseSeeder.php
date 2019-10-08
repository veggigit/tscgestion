<?php

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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(OfficesTableSeeder::class);
        $this->call(PartnerStatusesTableSeeder::class);
        $this->call(CivilStatusesTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(TestUsersTableSeeder::class);
        $this->call(PartnerTagsTableSeeder::class);
        // pivot
        $this->call(PartnerPartnerTagTableSeeder::class);
    }
}
