<?php

namespace App\Http\Controllers;
use App\volunteer;
use Illuminate\Http\Request;

use Session;
class VolunteerController extends Controller
{
    public function index()
    {
        $left=\DB::table('volunteers')->leftjoin('events','Event_id','=','events.id')->orderBy('volunteers.id','DESC')->get();
        return view('admin.volunteer.index',compact('left'));

    }

    public function create()
    {
        //
        $eventlists = \App\Admin\event::all();
        return view('admin.volunteer.create',compact('eventlists'));

    }

    public function store(Request $request)
    {
        //

        $count = volunteer::count();
        if($count == 0)
        {
           $lastId = 1;
        }
        else {
          $lastId = volunteer::select('id')->orderBy('id','desc')->first()->id;
          $lastId +=1;
        }
        // dd($request->get('EventId'));
       $volunteer = new volunteer([
         'VolId' => 'V'.$lastId,
         'VolName' => $request->get('Name'),
         'VolEmail' => $request->get('Email'),
         'VolNo' => $request->get('Contact'),
         'Event_id' => $request->get('EventId')
       ]);

       $volunteer->save();

       Session::flash('success_msg','Volunteer Added Successfully');

       return redirect('/admin/volunteer');

    }

    public function show($id)
    {
        //
        $volunteer = volunteer::find($id);
        return view('admin.volunteer.show',compact('volunteer'));

    }

    public function edit($id)
    {
        //
        $volunteer = volunteer::find($id);
        $eventlists = \App\Admin\event::all();
        return view('admin.volunteer.edit',compact('volunteer','eventlists'));

    }

    public function update(Request $request, $id)
    {
        //
        $volunteer = volunteer::find($id);

        $volunteer->VolName = $request->get('Name');
        $volunteer->VolEmail = $request->get('Email');
        $volunteer->VolNo = $request->get('Contact');
        $volunteer->Event_id = $request->get('EventId');

        $volunteer->save();

        Session::flash('success_msg','Volunteer Modified Successfully');

        return redirect('/admin/volunteer');



    }

    public function destroy($id)
    {
        //
        $volunteer = volunteer::find($id)->delete();

        Session::flash('success_msg','Volunteer Deleted Successfully');
        return redirect('/admin/volunteer');

    }
}
