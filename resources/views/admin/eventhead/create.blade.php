@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('EventHeadController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')

<div class="col-lg-12">
  <form method="post" action="{{action('EventHeadController@store')}}" onload="">
    <div class="form-group row">
      {{csrf_field()}}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="header">
                             <center><h3 class="title"><b>Add New Event Head</b></h3></center>
                         </div>
                         <div class="content">
                             <form>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Head Name : </label>
                                             <input id="labeltcolor" type="text" name="Name" class="form-control border-input" placeholder="Head Name" value="" required>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Email : </label>
                                             <input id="labeltcolor" type="email" name="Email" class="form-control border-input" placeholder="Head Email" value="" required>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label id="labelhcolor" >Contact No : </label>
                                           <input id="labeltcolor" type="text" name="Contact" class="form-control border-input" placeholder="Head Contact No" maxlength="10" title="Please enter correct Mobile no." required>
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
                                       <option value="{{$eventlist->id}}">{{$eventlist->EventName}}</option>
                                       @endforeach

                                       </select>
                                     </div>
                                  </div>
                              </div>
                                 <div class="text-center">
                                     <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
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
