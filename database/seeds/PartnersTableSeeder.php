<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Partner;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = (new FastExcel)->import(__DIR__.'/data_excel/partners.xlsx', function ($line) {

            // sanetize fuking blackdiamond chac
            $rut = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $line['rut']);
            $first_name = trim($line['first_name']);

            $second_name = trim($line['second_name']);
            if(empty($second_name))
            $second_name = null;

            $first_surname = trim($line['first_surname']);
            $second_surname = trim($line['second_surname']);

            $phone =  preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $line['phone']);
            if(empty($phone))
            $phone = null;

            $personal_email = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $line['personal_email']);
            $civil_status_id = $line['civil_status_id'];
            $region_id = $line['region_id'];
            $address = trim($line['address']);
            $corporative_email = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $line['corporative_email']);
            $office_id = $line['office_id'];
            $date_admission = $line['date_admission'];
            $partner_status_id = $line['partner_status_id'];

            return Partner::insert([
                'rut' => $rut,
                'first_name' => $first_name ,
                'second_name' => $second_name,
                'first_surname' =>  $first_surname,
                'second_surname' => $second_surname,
                'phone' => $phone,
                'personal_email' => $personal_email,
                'birthday' => null,
                'social_charges' => null,
                'civil_status_id' => $civil_status_id,
                'region_id' => $region_id,
                'address' => $address,
                'corporative_email' => $corporative_email,
                'office_id' => $office_id,
                'date_admission' => $date_admission,
                'partner_status_id' => $partner_status_id
            ]);
        });
    }
}
