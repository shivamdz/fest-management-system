@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('EventHeadController@index') }}">BACK</a>
@endsection

@section('content')



<div class="col-lg-12">

    <div class="form-group row">

      <div class="col-lg-12 col-md-12">
                     <div class="card" style="color: #000000;">
                       <strong>
                         <div class="header">
                             <center><h3 class="title"> {{$head->HeadName}} </h3></center>
                         </div>
                         <div class="content">
                              <form>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Email Id :</label>
                                             <label id="labeltcolor">{{$head->HeadEmail}}</label>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Contact No :</label>
                                             <label id="labeltcolor">{{$head->HeadNo}}</label>
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
