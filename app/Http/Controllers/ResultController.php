<?php

namespace App\Http\Controllers;
use App\event;
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
       
        $preg = \DB::table($result[0]['EventId'])->select('TeamId', 'Parti_id','Result')->whereNotNull('Result')->orderBy('Result')->get();
        return view('results.eventresults.show',compact('result','preg'));
    }

    public function indexoverall()
    {
        
    }
}
