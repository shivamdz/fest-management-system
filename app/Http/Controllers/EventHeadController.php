<?php

namespace App\Http\Controllers;

use App\Admin\event_head;
use Illuminate\Http\Request;
use Session;
class EventHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $heads = event_head::orderBy('id','DESC')->get();
        // dd($heads[0][4]);
        // $headname = \App\Admin\event::find($heads[0][EventId])->select('EventName')->first();
        $left=\DB::table('event_heads')->leftjoin('events','Event_id','=','events.id')->orderBy('event_heads.id','DESC')->get();
        return view('admin.eventhead.index',compact('left'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $eventlists = \App\Admin\event::all();
        return view('admin.eventhead.create',compact('eventlists'));

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

        $count = event_head::count();
        if($count == 0)
        {
           $lastId = 1;
        }
        else {
          $lastId = event_head::select('id')->orderBy('id','desc')->first()->id;
          $lastId +=1;
        }
        // dd($request->get('EventId'));
       $head = new event_head([
         'HeadId' => 'H'.$lastId,
         'HeadName' => $request->get('Name'),
         'HeadEmail' => $request->get('Email'),
         'HeadNo' => $request->get('Contact'),
         'Event_id' => $request->get('EventId')
       ]);

       $head->save();

       Session::flash('success_msg','Event Head Added Successfully');

       return redirect('/admin/eventhead');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\event_head  $eventhead
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $head = event_head::find($id);
        return view('admin.eventhead.show',compact('head'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\event_head  $eventhead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $head = event_head::find($id);
        $eventlists = \App\Admin\event::all();
        return view('admin.eventhead.edit',compact('head','eventlists'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\event_head  $eventhead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $head = event_head::find($id);

        $head->HeadName = $request->get('Name');
        $head->HeadEmail = $request->get('Email');
        $head->HeadNo = $request->get('Contact');
        $head->Event_id = $request->get('EventId');

        $head->save();

        Session::flash('success_msg','Event Head Modified Successfully');

        return redirect('/admin/eventhead');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\event_head  $eventhead
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $head = event_head::find($id)->delete();

        Session::flash('success_msg','Event Head Deleted Successfully');
        return redirect('/admin/eventhead');

    }


    /**
    * Send the list of events
    * @return \Illuminate\Http\Response
    */
    public function geteventlist()
    {
      // $eventlists = app\event::first()->get();
      // $eventlists = event::lists('title', 'id');
    // return response()->json(['success' => true, 'eventlists' => $eventlists]);
    return "hello";

    }
}
