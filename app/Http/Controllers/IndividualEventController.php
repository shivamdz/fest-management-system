<?php

namespace App\Http\Controllers;

use App\volunteer;
use App\participant;
use Illuminate\Http\Request;
use session;

class IndividualEventController extends Controller
{
    //<?php

    public function index()
    {

        $preg = \DB::table('EVT1')->select('Parti_id')->where('IsPresent','=','0')->get();

        $participants = participant::find($preg);

        return view('events.participant.index',compact('participants'));
    }



	public function store(Request $request)
    {

        $list = $request->get("IsPresent");

        \App\EVT1::whereIn('Parti_id',$list)->update(['IsPresent' => '1']);

        return redirect('/events/presentparticipants');
    }


    public function indexpresent()
    {

        $preg = \DB::table('EVT1')->select('TeamId','Parti_id')->orderBy('TeamId','asc')->where('IsPresent','=','1')->get();
        $presents = participant::find($preg);
        return view('events.presentparticipant.index',compact('presents','preg'));

    }

    public function indexschedule()
    {

        $schedule = \App\event::orderBy('id','ASC')->get();
        return view('events.schedule.index',compact('schedule'));

    }

    public function indexvolunteer()
    {

        $volunteers = volunteer::orderBy('id','DESC')->get();
        return view('events.volunteer.index',compact('volunteers'));

    }

}
