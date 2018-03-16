@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('CollegeController@index') }}">BACK</a>
@endsection

@section('content')



<div class="col-lg-12">

    <div class="form-group row">

      <div class="col-lg-12 col-md-12">
                     <div class="card" style="color: #000000;">
                       <strong>
                         <div class="header">
                             <center><h3 class="title"> {{$college->CName}} </h3></center>
                         </div>
                         <div class="content">
                              <form>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">City :</label>
                                             <label id="labeltcolor">{{$college->CCity}}</label>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">State :</label>
                                             <label id="labeltcolor">{{$college->CState}}</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Representative Name :</label>
                                             <label id="labeltcolor">{{$college->CRepName}}</label>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Representative Contact No :</label>
                                             <label id="labeltcolor">{{$college->CNo}}</label>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Representative Email :</label>
                                             <label id="labeltcolor">{{$college->CEmail}}</label>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Students Registered Till Date :</label>
                                             <label id="labeltcolor">{{$college->CTotal}}</label>

                                         </div>
                                     </div>
                                 </div>
                                </form>
                               </strong>
                           </div>

                     </div>
                 </div>
               </div>

</div>
@endsection
