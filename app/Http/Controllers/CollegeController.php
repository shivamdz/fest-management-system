<?php

namespace App\Http\Controllers;

use App\Admin\college;
use Illuminate\Http\Request;
use Session;
class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colleges = college::orderBy('id','DESC')->get();
        return view('admin.college.index',compact('colleges'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.college.create');

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

                $count = college::count();
                if($count == 0)
                {
                   $lastId = 1;
                }
                else {
                  $lastId = college::select('id')->orderBy('id','desc')->first()->id;
                  $lastId +=1;
                }

               $college = new college([
                 'CId' => 'C'.$lastId,
                 'CName' => $request->get('Name'),
                 'CCity' => $request->get('City'),
                 'CState' => $request->get('State'),
                 'CRepName' => $request->get('RepName'),
                 'CNo' => $request->get('RepContact'),
                 'CEmail' => $request->get('RepEmail'),
                 'CTotal' => '0'
               ]);

               $college->save();

               Session::flash('success_msg','College Added Successfully');

               return redirect('/admin/college');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\college  $college
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $college = college::find($id);
        return view('admin.college.show',compact('college'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\college  $college
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $college = college::find($id);
        return view('admin.college.edit',compact('college'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\college  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $college = college::find($id);

        $college->CName = $request->get('Name');
        $college->CCity = $request->get('City');
        $college->CState = $request->get('State');
        $college->CRepName = $request->get('RepName');
        $college->CNo = $request->get('RepContact');
        $college->CEmail = $request->get('RepEmail');

        $college->save();

        Session::flash('success_msg','College Details Modified Successfully');

        return redirect('/admin/college');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\college  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(college $college)
    {
        //
        $college = college::find($id)->delete();

        Session::flash('success_msg','College Removed Successfully');
        return redirect('/admin/college');

    }

    public function indexreception()
    {
        //
        $colleges = college::orderBy('id','ASC')->where('FeeStatus','=','0')->where('RegStatus','=','0')->get();
        return view('reception.status.index',compact('colleges'));

    }

    


}
