<?php

use Illuminate\Database\Seeder;

class EventHeadTableDtaSeeder extends Seeder
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

	    	DB::table('event_heads')->insert([

	    		'HeadId' => 'HEAD'.$idd,
				'HeadName' => str_random(8),
				'HeadNo' => random_int(7800000000,9999999999 ),
                'HeadEmail'=>str_random(10).'@email.com',
				'Event_id' => random_int(1,10)
                
			]);
            $idd++;

    }
}
}