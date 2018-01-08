@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('EventController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')
<div class="col-lg-12">
  <form method="post" action="{{action('EventController@store')}}" enctype="multipart/form-data">
    <div class="form-group row">
      {{csrf_field()}}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="header">
                             <center><h3 class="title"><b>Add New Event</b></h3></center>
                         </div>
                         <div class="content">
                             <form>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Event Name</label>
                                             <input type="text" name="EventName" class="form-control border-input" placeholder="Event Name" value="" >
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label>Event Password</label>
                                             <input type="text" name="Pass" class="form-control border-input" placeholder="Password" value="" >
                                           </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label>Event Description</label>
                                             <textarea rows="4" name="EventDesc" class="form-control border-input" placeholder="Enter Event description here" value=""></textarea>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Max People Per Team</label>
                                           <input type="number" name="MaxTeam" class="form-control border-input" placeholder="Max People Per Team" value="">
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Max Team Per College</label>
                                           <input type="number" name="MaxParti" class="form-control border-input" placeholder="Max Team Per College" value="">
                                       </div>
                                   </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label>Event Date</label>
                                             <input type="date" name="EventDate" class="form-control border-input" placeholder="Event Date" value="">
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label>Event Start Time</label>
                                         <input type="datetime" name="EventStartTime" class="form-control border-input" placeholder="Start Time" value="">
                                       </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label>Event End Time</label>
                                             <input type="datetime" name="EventEndTime" class="form-control border-input" placeholder="End time" value="">
                                         </div>
                                     </div>
                                 </div>

                                <div class="row">
                                  <div class="col-md-8">
                                     <div class="form-group">
                                       <label>Event Venue</label>
                                       <input type="string" name="EventVenue" class="form-control border-input" placeholder="Enter Event Venue Location" value="">
                                     </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Event Logo/Image</label>
                                    <input type="file" name="image" class="form-control border-input" placeholder="Upload Event logo here" accept="image/*" value="">
                                    </div>
                                </div>
                              </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label>Event Rules</label>
                                             <textarea rows="5" name="Rules" class="form-control border-input" placeholder="Press Enter to display in new line"></textarea>
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
