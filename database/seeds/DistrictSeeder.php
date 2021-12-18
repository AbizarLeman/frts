<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            'district' => 'Brunei-Muara'
        ]);
        DB::table('districts')->insert([
            'district' => 'Belait'
        ]);
        DB::table('districts')->insert([
            'district' => 'Tutong'
        ]);
        DB::table('districts')->insert([
            'district' => 'Temburong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Berakas B',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Burong Pingai Ayer',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Gadong A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Gadong B',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Kianggeh',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Kilanas',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Kota Batu',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Lumapas',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Mentiri',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Pangkalan Batu',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Peramu',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Saba',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Sengkurong',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Serasa',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Sungai Kebun',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Sungai Kedayan',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Tamoi',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Bukit Sawat',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Kuala Balai',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Kuala Belait',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Labi',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Liang',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Melilas',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Seria',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Sukang',
            'district' => 'Belait'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Kiudang',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Lamunin',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Pekan Tutong',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Rambai',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Tanjong Maya',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Telisai',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Ukong',
            'district' => 'Tutong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Bangar',
            'district' => 'Temburong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Batu Apoi',
            'district' => 'Temburong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Bokok',
            'district' => 'Temburong'
        ]);
        DB::table('mukims')->insert([
            'mukim' => 'Labu',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Anggerek Desa',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Burong Pingai Berakas',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Jaya Bakti',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Jaya Setia',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Lambak A',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Lambak B',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Lambak Kiri',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Orang Kaya Besar Imas',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Pancha Delima',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Pengiran Siraja Muda Delima Satu',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Pulaie',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Serusop',
            'mukim' => 'Berakas A',
            'district' => 'Brunei-Muara'
        ]);
        DB::table('villages')->insert([
            'village' => 'Kampong Kuala Balai',
            'mukim' => 'Kuala Balai',
            'district' => 'Belait'
        ]);
        DB::table('villages')->insert([
            'village' => 'Kampong Malaas',
            'mukim' => 'Kuala Balai',
            'district' => 'Belait'
        ]);
        DB::table('villages')->insert([
            'village' => 'Kampong Sungai Damit',
            'mukim' => 'Kuala Balai',
            'district' => 'Belait'
        ]);
        DB::table('villages')->insert([
            'village' => 'Kampong Sungai Besar',
            'mukim' => 'Kuala Balai',
            'district' => 'Belait'
        ]);
        DB::table('villages')->insert([
            'village' => 'Kampong Sungai Mendaram',
            'mukim' => 'Kuala Balai',
            'district' => 'Belait'
        ]);
        DB::table('villages')->insert([
            'village' => 'Bukit Panggal',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Ikas',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Keriam',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Kupang',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Luagan Dudok',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Maraburong',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Sinaut',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Sungai Kelugos',
            'mukim' => 'Keriam',
            'district' => 'Tutong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Amo A',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Amo B',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Amo C',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Batang Duri',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Belaban',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Biang',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Parit',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Selangan',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Sibulu',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Sibut',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Sumbiling Lama',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
        DB::table('villages')->insert([
            'village' => 'Sumbiling Baru',
            'mukim' => 'Amo',
            'district' => 'Temburong'
        ]);
    }
}
