<?php

use Illuminate\Database\Seeder;

class SchedulesTableDataSeeder extends Seeder
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

	    	DB::table('participants')->insert([

	    		'PartiId' => 'PAR'.$idd,
				'PartiName' => str_random(8),
				'Email' => str_random(8).'@email.com',
				'PartiNo' => random_int(7800000000, 9999999999),
				'CId' => 'COL'.random_int(1,10),
                
			]);
			$idd++;
    }
}
