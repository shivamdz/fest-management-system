<?php

use Illuminate\Database\Seeder;

class CollegeTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idd=1;
        for ($i=0; $i < 10; $i++) { 

	    	DB::table('colleges')->insert([

	    		'CId' => 'COL'.$idd,
				'CName' => str_random(20),
				'CCity' => str_random(20),
				'CState' => str_random(20),
				'CRepName' => str_random(20),
				'CNo' => random_int(7800000000, 9999999999),
				'CEmail' => str_random(20).'@email.com',
				'FeeStatus' => true,
				'RegStatus' => true,
				'CTotal' => random_int(15,20),
				
				
                
			]);
			$idd++;
    }
}
}