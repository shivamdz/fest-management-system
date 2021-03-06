<?php

namespace App\Http\Controllers;

use App\Admin\fest;
use Illuminate\Http\Request;
use Session;

class FestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $festinfo = fest::first();
        // $count = fest::count();
        return view('admin.festsetup.index',compact('festinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.festsetup.create');
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

        $image = $request->file('image');
        $path = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/admin-assets/img/');
        $image->move($destinationPath,$path);



        $festinfo= new fest([

        'FestName' => $request->get('FestName'),
        'FestInfo' => $request->get('FestDesc'),
        'FestOrg' => $request->get('OrganizedBy'),
        'Total' => $request->get('Max'),
        'FestLogo' => '/admin-assets/img/'.$path
        ]);

        $festinfo->save();
        Session::flash('success_msg','Fest Created Successfully');
        // Session::flash('success_msg','Now Go to festinfos Section to Add New festinfos');


        // return redirect()->route('admin.festinfo.index');
        return redirect('/admin/festsetup');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\fest  $fest
     * @return \Illuminate\Http\Response
     */
    public function show(fest $fest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fest  $fest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $festinfo = fest::find($id);
        return view('admin.festsetup.edit',compact('festinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\fest  $fest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $festinfo = fest::find($id);

        $image = $request->file('image');
        $path = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/admin-assets/img/');
        $image->move($destinationPath,$path);

          $festinfo->FestName = $request->get('FestName');
          $festinfo->FestInfo = $request->get('FestDesc');
          $festinfo->FestOrg = $request->get('OrganizedBy');
          $festinfo->Total = $request->get('Max');

          $festinfo->FestLogo = '/admin-assets/img/'.$path;

          $festinfo->save();


        Session::flash('success_msg','Fest Information Modified Successfully');

        // return redirect()->route('admin.festinfo.index');
        return redirect('/admin/festsetup');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\fest  $fest
     * @return \Illuminate\Http\Response
     */
    public function destroy(fest $fest)
    {
        //
    }
}
