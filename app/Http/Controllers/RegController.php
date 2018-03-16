<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Redirect;

class RegController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clist =\App\Admin\college::select("id","CName","CCity")->get();
        return view ('parti.index',compact('clist'));
    }

    public function getCount(Request $request)
    {
         $ColId = $request->get('ColId');
         $count = \App\Admin\college::select('id','CTotal','CName')->where('id','=',$ColId)->first();

        //  View::share('count',$count);

        //  $clist = \App\Admin\participants::where('Col_id','=',$ColId)->count('$id');

        //  dd($count);
        // $count = \App\Admin\college::where('CId','=',$ColId)->CTotal;
         return view ('parti.college',compact('count'));
    }



    public function getEventList(Request $request)
    {

      $errors = array();
      $names = $request->get('name');
      $emails = $request->get('email');
      $contacts = $request->get('contact');
      $id = $request->get('id');
      $c = sizeof($names);


      $count = \App\Admin\college::select('id','CTotal','CName')->where('id','=',$id)->first();


      $erremail = array_unique( array_diff_assoc( $emails, array_unique( $emails )));
      $errcontact = array_unique( array_diff_assoc( $contacts, array_unique( $contacts )));

      if($erremail != null or $errcontact != null)
      {
        return redirect()->back()
                  ->withInput(Input::all())
                  ->with('erremail',$erremail)
                  ->with('errcontact',$errcontact)
                  ->with('count',$count);
      }



      $t = 1;
      $flag = 0;
      foreach ($emails as $email) {

        $em = \App\Admin\participants::where('PartiEmail', '=', $email)->first();

        if ($em) {
                $errors["email"] = $email;
                $flag = 1;
        }
      }

      $t = 1;
      foreach ($contacts as $contact) {

        $co= \App\Admin\participants::where('PartiNo', '=', $contact)->first();

        if ($co) {
                $errors["contact"] = $contact;
                $flag = 1;
        }
      }

      // return Redirect::to('/fest/college')
      //           ->with(compact($count))
      //           ->withInput();
      // dd($count);
     if($flag == 1)
     {
      return redirect()->back()
                ->withInput(Input::all())
                ->with('errors',$errors)
                ->with('count',$count);
     }
      // return view('parti.college',compact('errors','count'));

      // return redirect::action('RegController@getCount')->with($errors);








      $lists = \App\Admin\event::select('id','EventId','EventDesc','EventName','Rules','MaxTeam','MaxParti','Path')->get();


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

        //  }
      }


            // return response()->json(array('lists'=> $lists), 200);
       return view ('parti.events',compact('lists','names','emails','contacts','id','c'));
    }

    public function getData(Request $request)
    {
         $list = \App\Admin\event::select('id','EventDesc','EventName','Rules','MaxTeam','MaxParti','Path')->get();

        //  dd($count);
        // $count = \App\Admin\college::where('CId','=',$ColId)->CTotal;
         return response()->json(array('list'=> $list), 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

           $errors = array();
           $flag = 0;
           $nselect = 0;
           $lerror = 0;

              $lists = \App\Admin\event::select('id','EventId','EventDesc','EventName','Rules','MaxTeam','MaxParti','Path')->get();


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



        $names = $request->get('name');
        $emails = $request->get('email');
        $contacts = $request->get('contact');
        $id = $request->get('colName');
        $c = sizeof($names);
        $_id=$id;






        // Validate the inputs

  foreach($lists as $list)
  {

       $eve = $request->get($list->EventId);
                 // dd($eve);
       $MTeam = $list->MaxTeam;
       $MParti = $list->MaxParti;


      $p = 0;
      $flag = 0;


     for($i = 1; $i <= $MTeam ; $i++)
       {

         $cTeam = \DB::table($list->EventId)
                   ->join('participants',$list->EventId.'.PartiId', '=' ,'participants.id')
                   ->where('participants.Col_id','=',$id)
                   ->distinct('TeamId')->count('TeamId');


             if($cTeam >= $MTeam)
             {
                    $flag = 1;
             }

             for($j = 1; $j <= $MParti ; $j++)
             {

                $tempid = $eve[$i][$j];
                // dd($tempid);
               if($tempid != "0")
               {

                 if($flag == 1 )
                 {
                 $p = 1;
                 $errors[$list->EventName] = "Max Team Limit Reached for Event ".$list->EventName." from your college";
                 $lerror = 1;
                 break;
                 }
                 else {
                    $nselect = 1;
                  }
               }
              }
           if($p == 1)
           {
             break;
           }
         }
       }

       if($lerror === 1)
       {

        //  return redirect()->back()
        //            ->withInput(Input::all())
        //            ->with('errors',$errors)
        //            ->with('lists',$lists)
        //            ->with('names',$names)
        //            ->with('emails',$emails)
        //            ->with('contacts',$contacts)
        //            ->with('id',$id)
        //            ->with('c',$c);
         //


          return view('parti.events',compact('errors','lists','names','emails','contacts','id','c'));
       }
       else
      if($nselect === 0)
       {
         $errors["none"] = "Please Select atleast one event";
        //  return redirect()->back()
        //            ->withInput(Input::all())
        //            ->with('errors',$errors)
        //            ->with('lists',$lists)
        //            ->with('names',$names)
        //            ->with('emails',$emails)
        //            ->with('contacts',$contacts)
        //            ->with('id',$id)
        //            ->with('c',$c);
         return view('parti.events',compact('errors','lists','names','emails','contacts','id','c'));
       }








        // Insert Participants Details

        for($i=1;$i<=sizeof($names);$i++)
        {

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
          'PartiName' => $names[$i],
          'PartiNo' => $contacts[$i],
          'PartiEmail' => $emails[$i],
          'Col_id' => $id
        ]);

          $parti->save();
          $idd[$i] = $parti->id;

       }

        // Increase College Registration Count
        // $id = $request->get('colName');

        $rcount = \App\Admin\college::select('CTotal')->where('id','=',$id)->first()->CTotal;

        $rcount = $rcount + sizeof($names);

        $icount = \App\Admin\college::find($id);

        $icount->CTotal = $rcount;

        $icount->save();





        foreach($lists as $list)
        {

       $eve = $request->get($list->EventId);

       $MTeam = $list->MaxTeam;
       $MParti = $list->MaxParti;



     for($i = 1; $i <= $MTeam ; $i++)
       {

         $cTeam = \DB::table($list->EventId)
                   ->join('participants',$list->EventId.'.PartiId', '=' ,'participants.id')
                   ->where('participants.Col_id','=',$id)
                   ->distinct('TeamId')->count('TeamId');

                          // ->orderBy($list->EventId.'.TeamId','desc')
// ->select($list->EventId.'.TeamId')
  //  SELECT EVT3.TeamId FROM EVT3 INNER JOIN participants ON EVT3.PartiId=participants.id WHERE participants.Col_id = 1 ORDER BY EVT3.TeamId DESC


             for($j = 1; $j <= $MParti ; $j++)
             {

                $tempid = $eve[$i][$j];
                // dd($tempid);
               if($tempid != "0")
               {

                    $tempid = $idd[$tempid];

                    \DB::table($list->EventId)->insert(
                      ['PartiId' => $tempid , 'TeamId' => $cTeam+1]
                    );

               }
              }
           }
         }


      return view('parti.thankyou');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
