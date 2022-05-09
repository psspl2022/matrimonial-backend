<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['income'=>''],
                 
            ['income'=>'No Income'], 
            ['income'=>'Rs. 0 - 1 Lakh'],    
            ['income'=>'Rs. 1 - 2 Lakh'],    
            ['income'=>'Rs. 2 - 3 Lakh'],     
            ['income'=>'Rs. 3 - 4 Lakh '],    
            ['income'=>'Rs. 4 - 5 Lakh'],
            ['income'=>'Rs. 5 - 7.5 Lakh  '],  
            ['income'=>'Rs. 7.5 - 10 Lakh  '],   
            ['income'=>'Rs. 10 - 15 Lakh '],    
            ['income'=>'Rs. 15 - 20 Lakh '],    
            ['income'=>'Rs. 20 - 25 Lakh '],    
            ['income'=>'Rs. 25 - 35 Lakh  '],  
            ['income'=>'Rs. 35 - 50 Lakh'],
            ['income'=>'Rs. 50 - 70 Lakh  '],   
            ['income'=>'Rs. 70 Lakh - 1 crore '],    
            ['income'=>'Rs. 1 crore & above'],
    
        ];
    }
}
