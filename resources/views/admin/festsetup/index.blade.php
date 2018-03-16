@extends('admin.layout.main')

@section('content')

<div class="col-lg-12">
  @if(Session::has('success_msg'))
  <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
  @endif
</div>

<div class="content">
  <div class="col-lg-12">

    @if(!empty($festinfo))
    <div class="card">

      <div class="header">
        <!-- <div class="row"> -->
          <div class="col-md-12">
            <div class="text-center">
               <b><h3 class="title" id="labelhcolor"> {{$festinfo->FestName}} </h3></b>
        </div>
      </div>
          <!-- <div class="col-md-5"> -->
        <!-- <div class="pull-right">
          <a class="btn btn-warning" href="{{ action('FestController@edit',$festinfo['id'])}}">MODIFY</a>
         </div> -->
       <!-- </div> -->
         <!-- </div> -->

      </div>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label id="labelhcolor">Fest Description :</label>
                    <pre id="labeltcolor">{{$festinfo->FestInfo}}</pre>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label id="labelhcolor">Organized By :</label>
                    <label id="labeltcolor">{{$festinfo->FestOrg}}</label>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label id="labelhcolor">Max Participants Allowed Per College :</label>
                    <label id="labeltcolor">{{$festinfo->Total}}</label>

                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label id="labelhcolor">Fest Logo/Image :</label>
             &emsp; &emsp;
             <img src="{{$festinfo->FestLogo}}" class="img-thumbnail" alt="{{$festinfo->FestLogo}}">
            <!-- <div class="caption"></div> -->
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
      <div class="pull-right">
        <a class="btn btn-warning btn-fill" href="{{ action('FestController@edit',$festinfo['id'])}}">MODIFY</a>
      </div>
    </div>
      </div>
    </div>
   </div>

    @else

     <div class="col-md-12 text-center">
       <h2>Welcome !!</h2>
     </div>
    <br> <br><br><br><br><br><br>
    <div class="col-md-12 text-center">
      <h3>Create Your Customized College Fest Management System</h3>
      <a class="btn btn-info btn-fill btn-lg" href="{{action('FestController@create')}}">Start</a>
    </div>

    @endif


</div>
</div>

@endsection
