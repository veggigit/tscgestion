<?php

use App\PartnerTag;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Database\Seeder;

class PartnerTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partnerTags = (new FastExcel)->import(__DIR__.'/data_excel/partner_tags.xlsx', function ($line) {
            return PartnerTag::insert([
                'name' => $line['name'],
                'description' => null,
                'created_at' => now()
            ]);
        });
    }
}
