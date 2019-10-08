<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\DB;

class PartnerPartnerTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pivot = (new FastExcel)->import(__DIR__.'/data_excel/partner_partner_tag.xlsx', function ($line) {
            return DB::table('partner_partner_tag')->insert([
                'partner_id' => $line['partner_id'],
                'partner_tag_id' => $line['partner_tag_id']
            ]);
        });
    }
}
