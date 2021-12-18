<?php

use Illuminate\Database\Seeder;

class OutputTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('output_types')->insert([
            'output_type' => 'rice',
            'output_type_string' => 'Rice',
        ]);
        DB::table('output_types')->insert([
            'output_type' => 'broiler',
            'output_type_string' => 'Broiler',
        ]);
        DB::table('output_types')->insert([
            'output_type' => 'vegetables',
            'output_type_string' => 'Vegetables',
        ]);
        DB::table('output_types')->insert([
            'output_type' => 'fruits',
            'output_type_string' => 'Fruits',
        ]);
        DB::table('output_types')->insert([
            'output_type' => 'cattle',
            'output_type_string' => 'Cattle',
        ]);
        DB::table('output_types')->insert([
            'output_type' => 'goats',
            'output_type_string' => 'Goats',
        ]);
        DB::table('output_types')->insert([
            'output_type' => 'eggs',
            'output_type_string' => 'Eggs',
        ]);
        DB::table('report_types')->insert([
            'report_type' => 'output_report',
            'report_type_string' => 'Eggs',
        ]);
    }
}
