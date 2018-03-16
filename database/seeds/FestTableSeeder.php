<?php

use Illuminate\Database\Seeder;

class FestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              

	    	DB::table('fest')->insert([

	    		'id' => 1,
				'FestName' => str_random(8),
				'FestInfo' => str_random(40),
				'FestLogo' => str_random(20),
				'FestOrg' =>str_random(10),
				'Total' => 20
                
			]);
            
    }
}
