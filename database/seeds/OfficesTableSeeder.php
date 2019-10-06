<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Office;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = (new FastExcel)->import(__DIR__.'/data_excel/offices.xlsx', function ($line) {
            return Office::insert([
                'name' => $line['name'],
                'region_id' => $line['region_id'],
                'created_at' => now()
            ]);
        });
    }
}
