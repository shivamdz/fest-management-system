@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('CollegeController@index') }}">BACK</a>
@endsection

@section('content')
<div class="col-lg-12">
  <form method="post" action="{{action('CollegeController@update',$college->id)}}" >
    <div class="form-group row">
      {{csrf_field()}}
      {{ method_field('PUT') }}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                       <div class="header">
                           <center><h3 class="title"><b>Edit College</b></h3></center>
                       </div>
                       <div class="content">
                         <form>
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label id="labelhcolor">College Name : </label>
                                         <input id="labeltcolor" type="text" name="Name" class="form-control border-input" placeholder="" value="{{$college->CName}}" required>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label id="labelhcolor">City : </label>
                                         <input id="labeltcolor" type="text" name="City" class="form-control border-input" placeholder="" value="{{$college->CCity}}" required>
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label id="labelhcolor" >State : </label>
                                       <input id="labeltcolor" type="text" name="State" class="form-control border-input" placeholder="" value="{{$college->CState}}">
                                   </div>
                               </div>
                             </div>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label id="labelhcolor" >Representative Name : </label>
                                    <input id="labeltcolor" type="text" name="RepName" class="form-control border-input" placeholder="" value="{{$college->CRepName}}">
                                </div>
                            </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelhcolor" >Representative Contact No : </label>
                                        <input id="labeltcolor" type="number" name="RepContact" class="form-control border-input" placeholder="" value="{{$college->CNo}}">
                                    </div>
                                </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="labelhcolor" >Representative Email : </label>
                                            <input id="labeltcolor" type="email" name="RepEmail" class="form-control border-input" placeholder="" value="{{$college->CEmail}}">
                                        </div>
                                    </div>
                                      </div>


                          </div>
                             <div class="text-center">
                                 <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
                             </div>
                             <br>
                             <div class="clearfix"></div>
                         </form>

                       </div>
                     </div>
                 </div>
               </div>

  </form>
</div>
@endsection
