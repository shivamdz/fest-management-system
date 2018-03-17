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

        $pregs = \DB::table('EVT1')->select('Parti_id')->where('IsPresent','=','0')->get();

        // $d = $preg->toArray();
        // foreach()
        // @endforeach
        if(count($pregs)>0)
        {
        $i=0;
        $d ;
        foreach($pregs as $preg)
          {
            $d[$i] = $preg->Parti_id;
            $i++;
          }

          // dd($preg[0]->Parti_id);
        // dd($preg);
        $participants = participant::find($d);
       }
       $id = 'EVT1';

        return view('events.participant.index',compact('participants','id'));

    }


	public function store(Request $request)
    {

      // dd($request->all());
      $list = $request->get("IsPresent");
      $name = $request->get("name");
      //  dd($list);
        \DB::table($name)->whereIn('Parti_id',$list)->update(['IsPresent' => '1']);

        return redirect('/events/presentparticipants');
    }


    public function indexpresent()
    {

        $pregs = \DB::table('EVT1')->select('TeamId','Parti_id')->orderBy('TeamId','asc')->where('IsPresent','=','1')->get();
        $i=0;
        if(count($pregs)>0)
        {
        $d;
        foreach($pregs as $preg)
          {
            $d[$i] = $preg->Parti_id;
            $i++;
          }
        }
         $id = 'EVT1';

        $presents = participant::find($d);
        $submitted = \DB::table('EVT1')->select('Result')->where('Result','=','1')->get();
        $sub = 0;
        if(sizeof($submitted) > 0)
        {
          $sub = 1;
        }
        return view('events.presentparticipant.index',compact('presents','pregs','id','sub'));
    }

    public function updateresult(Request $request)
    {
      // dd($request->all());
      $first = $request->get('first');
      $second = $request->get('second');
      $third = $request->get('third');
      $name = $request->get("name");


      \DB::table($name)->where('TeamId',$first)->update(
        ['Result' => '1']
      );

      \DB::table($name)->where('TeamId',$second)->update(
        ['Result' => '2']
      );

      \DB::table($name)->where('TeamId',$third)->update(
        ['Result' => '3']
      );

      $submitted = \DB::table('EVT1')->select('Result')->where('Result','=','1')->get();
      $sub = 0;
      if(sizeof($submitted) > 0)
      {
        $sub = 1;
      }


       return redirect()->back()
                 ->with('sub',$sub);



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
