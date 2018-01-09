<?php

namespace App\Http\Controllers;

use App\event;
use Illuminate\Http\Request;
use Session;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $events = event::orderBy('id','DESC')->paginate(5);
        $events = event::orderBy('id','DESC')->get();
        return view('admin.event.index',compact('events'));
        // ->with('i', ($request->input('page', 1) - 1) * 5);
        //  return view('admin.event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return view('admin.event.store');
        //  $this->validate($request, [
        //    //validate Data
        //    'ename' => 'required',
        //    'epass' => 'required'
        //  ]);

        // $eventData = $request->all();
        // echo '<script>alert("'$eventData'")</script>';
        // event::create($eventData);


        $image = $request->file('image');
        $path = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/admin-assets/img/events/');
        $image->move($destinationPath,$path);

        // $lastId = \DB::getPdo()->lastInsertId();
        // echo '<script>alert("{{$lastId->id}}")</script>';
        // $lastId = \DB::tables('events')->orderBy('id','desc')->first()->id;
         $count = event::count();
         if($count == 0)
         {
            $lastId = 1;
         }
         else {
           $lastId = event::select('id')->orderBy('id','desc')->first()->id;
           $lastId +=1;
         }

        $event = new event([
          'EventId' => 'EVT'.$lastId,
          'EventName' => $request->get('EventName'),
          'EventDesc' => $request->get('EventDesc'),
          'EventDate' => $request->get('EventDate'),
          'EventStartTime' => $request->get('EventStartTime'),
          'EventEndTime' => $request->get('EventEndTime'),
          'EventVenue' => $request->get('EventVenue'),
          'Rules' => $request->get('Rules'),
          'MaxTeam' => $request->get('MaxTeam'),
          'MaxParti' => $request->get('MaxParti'),
          'Pass' => $request->get('Pass'),
          'Path' => '/admin-assets/img/events/'.$path
        ]);

        $event->save();

        Session::flash('success_msg','Event Added Successfully');

        // return redirect()->route('admin.event.index');
        return redirect('/admin/event');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $events
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $event = event::find($id);
        return view('admin.event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $event = event::find($id);
        // echo '<script>alert("{{$event->id}}")</script>';

        return view('admin.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $event = event::find($id);

      $image = $request->file('image');
      $path = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/admin-assets/img/events/');
      $image->move($destinationPath,$path);



        $event->EventName = $request->get('EventName');
        $event->EventDesc = $request->get('EventDesc');
        $event->EventDate = $request->get('EventDate');
        $event->EventStartTime = $request->get('EventStartTime');
        $event->EventEndTime = $request->get('EventEndTime');
        $event->EventVenue = $request->get('EventVenue');
        $event->Rules = $request->get('Rules');
        $event->MaxTeam = $request->get('MaxTeam');
        $event->MaxParti = $request->get('MaxParti');
        $event->Pass = $request->get('Pass');
        $event->Path = '/admin-assets/img/events/'.$path;


      $event->save();

      Session::flash('success_msg','Event Modified Successfully');

      // return redirect()->route('admin.event.index');
      return redirect('/admin/event');

        // return view('admin.event.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo '<script>alert("$eventData")</script>';
        $event = event::find($id)->delete();

        Session::flash('success_msg','Event Deleted Successfully');
        return redirect('/admin/event');
    }
}
