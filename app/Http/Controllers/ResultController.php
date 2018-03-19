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
        $left=\DB::table($result[0]['EventId'])->join('participants','Parti_id','=','participants.id')->join('colleges','participants.Col_id','=','colleges.id')->orderBy('Result')->get();

        $right=\DB::table($result[0]['EventId'])->join('participants','Parti_id','=','participants.id')->join('colleges','participants.Col_id','=','colleges.id')->orderBy('Result','DESC')->get();

        return view('results.eventresults.show',compact('result','left','right'));





    }


    public function indexresult()
    {
       $result=event::select('EventId','EventName')->where('id','=','1')->get();
        $left=\DB::table('EVT1')->leftjoin('participants','Parti_id','=','participants.id')->orderBy('Result')->get();
        return view('events.result.index',compact('result','left'));
    }

    public function indexoverall()
    { 

        \DB::table('results')->truncate();
        $col=array();

     $coll=college::select('id')->get();
     for($i=1;$i<=count($coll);$i++)
        {
            $col[$i]=0;
        }
    
     $f=$s=$t=-1;
     $fi=$si=$ti=-1;
        $result=event::select('EventId','EventName')->get();
        foreach($result as $results)
          {  $p=\DB::table($results['EventId'])->join('participants','Parti_id','=','participants.id')->join('colleges','participants.Col_id','=','colleges.id')->get();

             foreach($p as $ps)
                {
                  
                    if($ps->Result ==1)
                    {
                        $col[$ps->Col_id]=$col[$ps->Col_id]+3;
                        
                    }
                    elseif($ps->Result ==2)
                    {
                        $col[$ps->Col_id]=$col[$ps->Col_id]+2;
                    }
                    elseif($ps->Result ==3)
                    {
                        $col[$ps->Col_id]=$col[$ps->Col_id]+1;
                    }
                    else continue;
                    
                } 
              

            }
            
           for($i=1;$i<=count($coll);$i++)
            {
                if($col[$i]>$f)
                {
                    $t=$s;
                    $ti=$si;
                    $s=$f;
                    $si=$fi;
                    $f=$col[$i];
                    $fi=$i;
                    }

                elseif($col[$i]>$s)
                {
                    $t=$s;
                    $ti=$si;
                    $s=$col[$i];
                    $si=$i;
                   
                   
                }

                elseif($col[$i]>$t)
                {
                    $t=$col[$i];
                    $ti=$i;
                   
                }
            }
            
            \DB::table('results')->insert(['Col_id' => $fi, 'TScore' => 1]);
            \DB::table('results')->insert(['Col_id' => $si, 'TScore' => 2]);
            \DB::table('results')->insert(['Col_id' => $ti, 'TScore' => 3]);
            
        



        $left=\DB::table('results')->leftjoin('colleges','results.Col_id','=','colleges.id')->orderBy('TScore')->get();

        return view('results.overallresult.index',compact('left'));

    }


}
