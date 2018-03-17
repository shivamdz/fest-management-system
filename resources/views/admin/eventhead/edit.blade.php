@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('EventHeadController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')
<div class="col-lg-12">
  <form method="post" action="{{action('EventHeadController@update',$head->id)}}" >
    <div class="form-group row">
      {{csrf_field()}}
      {{ method_field('PUT') }}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                       <div class="header">
                           <center><h3 class="title"><b>Edit Event Head</b></h3></center>
                       </div>
                       <div class="content">
                           <form>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Head Name : </label>
                                           <input type="text" name="Name" class="form-control border-input" placeholder="Head Name" value="{{$head->HeadName}}" required>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label>Email : </label>
                                           <input type="email" name="Email" class="form-control border-input" placeholder="Head Email" value="{{$head->HeadEmail}}" required>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label>Contact No : </label>
                                         <input type="text" name="Contact" class="form-control border-input" placeholder="Head Contact No" value="{{$head->HeadNo}}" maxlength="10" title="Please enter correct Mobile no." required>
                                     </div>
                                 </div>
                               </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="form-group">
                                     <label>Assign Event :</label>
                                     <br>
                                     <!-- <input type="string" name="EventId" class="form-control border-input" placeholder="Select Event " value="{{$head->EventId}}"> -->
                                     <select class="col-md-12" name="EventId">
                                     <option value="0" >Unassign</option>
                                     @foreach( $eventlists as $eventlist)
                                     <option value="{{$eventlist->id}}">{{$eventlist->EventName}}</option>
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
