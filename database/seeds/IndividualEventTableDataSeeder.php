<?php

use Illuminate\Database\Seeder;

class IndividualEventTableDataSeeder extends Seeder
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

	    	DB::table('individual_events')->insert([

	    		'TeamId' => $idd,
	    		'Result' => 0,
			    'IsPresent' =>true,
			    'Parti_id' =>random_int(1,10)
                
			]);
            $idd++;
    }
}
}