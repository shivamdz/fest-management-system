@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('VolunteerController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')
<div class="col-lg-12">
  <form method="post" action="{{action('VolunteerController@update',$volunteer->id)}}" >
    <div class="form-group row">
      {{csrf_field()}}
      {{ method_field('PUT') }}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                       <div class="header">
                           <center><h3 class="title"><b>Edit Volunteer</b></h3></center>
                       </div>
                       <div class="content">
                           <form>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Volunteer Name : </label>
                                           <input type="text" name="Name" class="form-control border-input" placeholder="Vol Name" value="{{$volunteer->VolName}}" required>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Email : </label>
                                           <input type="email" name="Email" class="form-control border-input" placeholder="Vol Email" value="{{$volunteer->VolEmail}}" required>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label>Contact No : </label>
                                         <input type="text" name="Contact" class="form-control border-input" placeholder="Vol Contact No" value="{{$volunteer->VolNo}}" pattern="^[1-9]\d{9}$" maxlength="10" title="Please enter correct Mobile no." required>
                                     </div>
                                 </div>
                               </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                     <label>Assign Event :</label>
                                     <br>
                                     
                                     <select class="col-md-12" name="EventId">
                                     <option value="0" >Unassign</option>
                                     @foreach( $eventlists as $eventlist)
                                     <option value="{{$eventlist->id}}">{{$eventlist->VolName}}</option>
                                     @endforeach
                                     </select>
                                   </div>
                                </div>
                            </div>
                            <br>
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
