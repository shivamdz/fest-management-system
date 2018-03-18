<?php

namespace App\Http\Controllers;
use App\Admin\event;
use App\Admin\college;
use App\result;
use App\individual_event;
use Illuminate\Http\Request;
use session;
class ResultController extends Controller
{
   
     public function index()
    {  
        $events = event::orderBy('id','ASC')->get();
        return view('results.eventresults.index',compact('events'));
       
    }

    public function show($id)
    {
      
        
        $result=event::select('EventId','EventName')->where('id','=',$id)->get();
        $left=\DB::table($result[0]['EventId'])->leftjoin('participants','Parti_id','=','participants.id')->orderBy('Result')->get();
        return view('results.eventresults.show',compact('result','left'));





    }


    public function indexresult()
    {
       $result=event::select('EventId','EventName')->where('id','=','1')->get();
        $left=\DB::table('EVT1')->leftjoin('participants','Parti_id','=','participants.id')->orderBy('Result')->get();
        return view('events.result.index',compact('result','left'));
    }

    public function indexoverall()
    {
        
        $left=\DB::table('results')->leftjoin('colleges','results.Col_id','=','colleges.id')->orderBy('TScore')->get();
        return view('results.overallresult.index',compact('left'));

    }
}
