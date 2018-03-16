<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
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

	    	DB::table('events')->insert([

	    		'EventId' => 'EVT'.$idd,
				'EventName' => str_random(20),
				'EventDesc' => str_random(60),
				'EventStartDate' => '2018-02-10 15:40:00',
				'EventEndDate' => '2018-02-10 20:50:00',
				'EventVenue' => str_random(10),
				'Rules' => str_random(60),
				'MaxTeam'=> 3,
				'MaxParti'=> 3,
				'Pass'=> str_random(30),
				'Path'=> str_random(15),
				'Fest_id'=>1
                
			]);
            $idd++;
    }
}
}