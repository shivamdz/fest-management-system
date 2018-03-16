@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('FestController@index') }}">BACK</a>
@endsection

@section('content')
<div class="col-lg-12">
  <form method="post" action="{{action('FestController@update',$festinfo->id)}}" enctype="multipart/form-data">
    <div class="form-group row">
      {{csrf_field()}}
      {{method_field('PUT')}}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="header">
                             <center><h3 class="title"><b>Edit Fest</b></h3></center>
                         </div>
                         <div class="content">
                             <form>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label id="labelhcolor">Fest Name</label>
                                           <input id="labeltcolor" type="text" name="FestName" class="form-control border-input" placeholder="Fest Name" value="{{$festinfo->FestName}}" required>
                                       </div>
                                   </div>
                              </div>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label id="labelhcolor">Fest Description :</label>
                                           <textarea id="labeltcolor" rows="4" name="FestDesc" class="form-control border-input" placeholder="Enter Fest description here" value="" required>{{$festinfo->FestInfo}}</textarea>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label id="labelhcolor">Organized By :</label>
                                           <input id="labeltcolor" type="text" name="OrganizedBy" class="form-control border-input" placeholder="Organized By (Enter your College Name here) " value="{{$festinfo->FestOrg}}" required>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label id="labelhcolor">Max Participants Allowed Per College :</label>
                                           <input id="labeltcolor" type="number" name="Max" class="form-control border-input" placeholder="Total no. of participants allowed from each College " value="{{$festinfo->Total}}">

                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="form-group">
                                   <label id="labelhcolor">Fest Logo/Image :</label>
                                    &emsp; &emsp;
                                    <input id="labeltcolor" type="file" name="image" class="form-control border-input" placeholder="Upload Fest logo here" accept="image/*" value="">

                                   </div>
                               </div>

                                 <div class="text-center">
                                     <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
                                 </div>
                                 <div class="clearfix"></div>
                             </form>
                         </div>
                     </div>
                 </div>
               </div>

  </form>
</div>
@endsection
