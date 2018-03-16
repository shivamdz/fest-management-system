
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
                             <center><h3 class="title"><b>Result</b></h3></center>
                         </div>
                         <div class="content">
                             <form>
                                 <div class="row">
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label>First</label>
                                             <input type="text" name="TeamId" class="form-control border-input" placeholder="Team ID" value="" >
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label>Second</label>
                                             <input type="text" name="Result" class="form-control border-input" placeholder="Result" value="" >
                                           </div>
                                     </div>
                                 

                                 
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label>Third</label>
                                             <input type="number" name="Score" class="form-control border-input" placeholder="Score" value="">

                                         </div>
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
