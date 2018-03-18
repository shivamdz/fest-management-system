<?php

namespace App\Http\Controllers;

use App\Admin\participants;
use Illuminate\Http\Request;
use Session;

class AdminParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = \App\Admin\college::select('id','CId','CName','FeeStatus')->where('CTotal','>','0')->get();

        return view('admin.participant.index',compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
      //  $id = request()->route('id');
       return view('admin.participant.create',compact('id'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id = $request->get('ColId');
        $name = $request->get('name');
        $email = $request->get('email');
        $contact = $request->get('contact');

        $count = \App\Admin\participants::count();
        if($count == 0)
        {
           $lastId = 1;
        }
        else {
          $lastId = \App\Admin\participants::select('id')->orderBy('id','desc')->first()->id;
          $lastId +=1;
        }

        $parti = new \App\Admin\participants([
          'PartiId' => 'P'.$lastId,
          'PartiName' => $name,
          'PartiNo' => $contact,
          'PartiEmail' => $email,
          'Col_id' => $id
        ]);

          $parti->save();

          $rcount = \App\Admin\college::select('CTotal')->where('id','=',$id)->first()->CTotal;

          $rcount = $rcount + 1;

          $icount = \App\Admin\college::find($id);

          $icount->CTotal = $rcount;

          $icount->save();

          Session::flash('success_msg','Participant Added Successfully . Now click on Modify Event to Assign.');

          return redirect('/admin/participant');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $participants = \App\Admin\participants::where('Col_id','=',$id)->get();

        return view('admin.participant.show',compact('participants'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $participants = \App\Admin\participants::where('Col_id','=',$id)->get();

        return view('admin.participant.edit',compact('participants','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $pid = $request->get('id');
       $name = $request->get('name');
       $email = $request->get('email');
       $contact = $request->get('contact');

       for($i = 0;$i < count($name);$i++)
       {
           \DB::table('participants')->where('id',$pid[$i])
           ->update([
               'PartiName' => $name[$i],
               'PartiEmail' => $email[$i],
               'PartiNo' => $contact[$i],
       ]);

       }
       Session::flash('success_msg','participants Modified Successfully');

       // return redirect()->route('admin.event.index');
       return redirect('/admin/participant');

    }


    public function event($id)
    {

      $lists = \App\Admin\event::select('id','EventId','EventDesc','EventName','Rules','MaxTeam','MaxParti','Path')->get();

      $participants = \App\Admin\participants::where('Col_id','=',$id)->get();



      foreach($lists as $key => $value )
      {
        try
        {
        $count = \DB::table($lists[$key]['EventId'])->count();
        // $count = \App\Admin\event::count();
        if($count == 0)
        {
          $t = 0;
        }
        else
        {
         $t = \DB::table($lists[$key]['EventId'])->select('TeamId')->orderBy('TeamId','desc')->first()->TeamId;
        }
        }
        catch(Exception $e)
        {
        }

         $lists[$key]['TeamCount'] = $t;

      }

      // dd($participants);
      foreach($lists as $key => $value )
      {
        $team[$lists[$key]['EventId']] = \DB::table($lists[$key]['EventId'])
                  ->select('TeamId','PartiId','PartiName')
                  ->join('participants',$lists[$key]['EventId'].'.Parti_id', '=' ,'participants.id')
                  ->where('participants.Col_id','=',$id)
                  ->orderBy('TeamId','asc')
                  ->get();
      }

    // dd($team,$cteam);
    //   $team['EVT1'][0]->TeamId = 1;
     //
    //  $team['EVT1'][1]->TeamId = 2;

     foreach($lists as $key => $value )
     {
         $t = 1;
       for($k = 0;$k < count($team[$lists[$key]['EventId']])-1 ;$k++)
       {

       $old = $team[$lists[$key]['EventId']][$k]->TeamId;
       if($team[$lists[$key]['EventId']][$k+1]->TeamId === $old)
       {
         $team[$lists[$key]['EventId']][$k]->TeamId = $t;
         $team[$lists[$key]['EventId']][$k+1]->TeamId = $t;
       }
       else {
         $team[$lists[$key]['EventId']][$k]->TeamId = $t;
         $t = $t+1;
       }
      //  dd($old);
       }
       if($team[$lists[$key]['EventId']][$k]->TeamId != $old)
       {
         $team[$lists[$key]['EventId']][$k]->TeamId = $t;
       }
     }

    //  dd($team);





            // return response()->json(array('lists'=> $lists), 200);
       return view ('admin.participant.event',compact('lists','participants','team','id'));

    }

    public function updateinfo(Request $request,$id)
    {

      $lists = \App\Admin\event::select('id','EventId','EventDesc','EventName','Rules','MaxTeam','MaxParti','Path')->get();

      $participants = \App\Admin\participants::where('Col_id','=',$id)->get();



      foreach($lists as $key => $value )
      {
        try
        {
        $count = \DB::table($lists[$key]['EventId'])->count();
        // $count = \App\Admin\event::count();
        if($count == 0)
        {
          $t = 0;
        }
        else
        {
         $t = \DB::table($lists[$key]['EventId'])->select('TeamId')->orderBy('TeamId','desc')->first()->TeamId;
        }
        }
        catch(Exception $e)
        {
        }

         $lists[$key]['TeamCount'] = $t;

      }

      // dd($participants);
      foreach($lists as $key => $value )
      {
        $team[$lists[$key]['EventId']] = \DB::table($lists[$key]['EventId'])
                  ->select('TeamId','PartiId','PartiName','id')
                  ->join('participants',$lists[$key]['EventId'].'.Parti_id', '=' ,'participants.id')
                  ->where('participants.Col_id','=',$id)
                  ->orderBy('TeamId','asc')
                  ->get();
      }

    // dd($team,$cteam);
    //   $team['EVT1'][0]->TeamId = 1;
     //
    //  $team['EVT1'][1]->TeamId = 2;

     foreach($lists as $key => $value )
     {
         $t = 1;
       for($k = 0;$k < count($team[$lists[$key]['EventId']])-1 ;$k++)
       {

       $old = $team[$lists[$key]['EventId']][$k]->TeamId;
       if($team[$lists[$key]['EventId']][$k+1]->TeamId === $old)
       {
         $team[$lists[$key]['EventId']][$k]->TeamId = $t;
         $team[$lists[$key]['EventId']][$k+1]->TeamId = $t;
       }
       else {
         $team[$lists[$key]['EventId']][$k]->TeamId = $t;
         $t = $t+1;
       }
      //  dd($old);
       }
       if($team[$lists[$key]['EventId']][$k]->TeamId != $old)
       {
         $team[$lists[$key]['EventId']][$k]->TeamId = $t;
       }
     }





      foreach($lists as $list)
      {

     $eve = $request->get($list->EventId);

     $MTeam = $list->MaxTeam;
     $MParti = $list->MaxParti;


   $p = 0;
   for($i = 1; $i <= $MTeam ; $i++)
     {

      //  $cTeam = \DB::table($list->EventId)->distinct('TeamId')->count('TeamId');


           for($j = 1; $j <= $MParti ; $j++)
           {

              $tempid = $eve[$i][$j];

              // dd($tempid);
             if($tempid != "0")
             {
              //  print_r($team[$list->EventId][$p]->TeamId);
                 if($team[$list->EventId][$p]->TeamId === $i)
                 {
                  $oldid = $team[$list->EventId][$p]->id;
                  // print_r($oldid);
                  // print_r("\n");
                  //
                  // print_r($tempid);

                  \DB::table($list->EventId)->where('Parti_id','=',$oldid)->update(
                    ['Parti_id' => $tempid]
                  );

                  $p++;

                 }
                 else {

                     $c = \DB::table($list->EventId)
                           ->select('TeamId')
                           ->where('Parti_id','=',$eve[$i][1])
                           ->first();
                      // dd($c);
                     \DB::table($list->EventId)->insert(
                       ['Parti_id' => $tempid , 'TeamId' => $c->TeamId]
                     );

                 }
              }
           }
       }

    }

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\participants  $participants
     * @return \Illuminate\Http\Response
     */
    public function destroy(participants $participants)
    {
        //
    }
}
