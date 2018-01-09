@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('EventController@index') }}">BACK</a>
@endsection

@section('content')

<style>
#labelhcolor {
color: #595959;
}
#labeltcolor {
font-style:italic;
}
</style>


<!-- <div class="col-lg-12">

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="text-center">

            <h2>{{$event->EventName}}</h2>

        </div>

    </div>

</div>

<br><br>

<div class="col-lg-12">
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Title:</strong>

            {{ $event->EventName }}

        </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Description:</strong>

            {{ $event->desc }}

        </div>

    </div>


</div>
</div>
</div> -->
<div class="col-lg-12">

    <div class="form-group row">

      <div class="col-lg-12 col-md-12">
                     <div class="card" style="color: #000000;">
                       <strong>
                         <div class="header">
                             <center><h3 class="title"> {{$event->EventName}} </h3></center>
                         </div>
                         <div class="content">
                              <form>

                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Event Description :</label>
                                             <pre id="labeltcolor">{{$event->EventDesc}}</pre>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Event Rules :</label>
                                             <pre id="labeltcolor">{{$event->Rules}}</pre>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label id="labelhcolor">Event Date :</label>
                                             <label id="labeltcolor">{{$event->EventDate}}</label>

                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label id="labelhcolor">Event Start Time :</label>
                                             <label id="labeltcolor">{{$event->EventStartTime}}</label>

                                       </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label id="labelhcolor">Event End Time :</label>
                                             <label id="labeltcolor">{{$event->EventEndTime}}</label>

                                         </div>
                                     </div>
                                 </div>


                                    <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label id="labelhcolor">Max People Per Team :</label>
                                              <label id="labeltcolor">{{$event->MaxParti}}</label>

                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label id="labelhcolor">Max Team Per College :</label>
                                              <label id="labeltcolor">{{$event->MaxTeam}}</label>

                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                         <div class="form-group">
                                           <label id="labelhcolor">Event Venue :</label>
                                           <label id="labeltcolor">{{$event->EventVenue}}</label>

                                         </div>
                                    </div>
                                  </div>

                                <div class="row">

                                  <div class="col-md-12">
                                    <div class="form-group">
                                    <label id="labelhcolor">Event Logo/Image :</label>
                                    <!-- <label id="labeltcolor">{{$event->Path}}</label> -->
                                     &emsp; &emsp;
                                     <img src="{{$event->Path}}" class="img-thumbnail" alt="{{$event->Path}}">
                                    <!-- <div class="caption"></div> -->

                                    </div>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label id="labelhcolor">Event Password :</label>
                                          <label id="labeltcolor">{{$event->Pass}}</label>
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
