<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['height'=>'4\' 0" (1.22 mts) '],
            ['height'=>'4\' 1" (1.24 mts)'],
            ['height'=>'4\' 2" (1.28 mts)'], 
            ['height'=>'4\' 3" (1.31 mts) '],
            ['height'=>'4\' 4" (1.34 mts)'], 
            ['height'=>'4\' 5" (1.35 mts)'],
            ['height'=>'4\' 6" (1.37 mts) '],
            ['height'=>'4\' 7" (1.40 mts)'],
            ['height'=>'4\' 8" (1.42 mts) '],
            ['height'=>'4\' 9" (1.45 mts) '],
            ['height'=>'4\' 10" (1.47 mts) '],
            ['height'=>'4\' 11" (1.50 mts) '],
            ['height'=>'5\' 0" (1.52 mts) '],
            ['height'=>'5\' 1" (1.55 mts) '],
            ['height'=>'5\' 2" (1.58 mts) '], 
            ['height'=>'5\' 3" (1.60 mts) '],
            ['height'=>'5\' 4" (1.63 mts) '],
            ['height'=>'5\' 5" (1.65 mts) '],
            ['height'=>'5\' 6" (1.68 mts) '],
            ['height'=>'5\' 7" (1.70 mts) '],
            ['height'=>'5\' 8" (1.73 mts) '],
            ['height'=>'5\' 9" (1.75 mts) '],
            ['height'=>'5\' 10" (1.78 mts) '],
            ['height'=>'5\' 11" (1.80 mts) '],
            ['height'=>'6\' 0" (1.83 mts) '],
            ['height'=>'6\' 1" (1.85 mts) '],
            ['height'=>'6\' 2" (1.88 mts)  '],
            ['height'=>'6\' 3" (1.91 mts)  '],
            ['height'=>'6\' 4" (1.93 mts)  '],
            ['height'=>'6\' 5" (1.96 mts)  '],
            ['height'=>'6\' 6" (1.98 mts) '],
            ['height'=>'6\' 7" (2.01 mts) '],
            ['height'=>'6\' 8" (2.03 mts)'],
            ['height'=>'6\' 9" (2.06 mts) '],
            ['height'=>'6\' 10" (2.08 mts) '],
            ['height'=>'6\' 11" (2.11 mts) '],
            ['height'=>'7\' (2.13 mts)']
        ];

        DB::table('heights')->insert($data);
    }
}
