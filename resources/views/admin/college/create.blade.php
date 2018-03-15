@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('CollegeController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')

<div class="col-lg-12">
  <form method="post" action="{{action('CollegeController@store')}}" onload="">
    <div class="form-group row">
    </div>
      {{csrf_field()}}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="header">
                             <center><h3 class="title"><b>Add New College</b></h3></center>
                         <div class="content">
                             <form>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">College Name : </label>
                                             <input id="labeltcolor" type="text" name="Name" class="form-control border-input" placeholder="" value="" required>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">City : </label>
                                             <input id="labeltcolor" type="text" name="City" class="form-control border-input" placeholder="" value="" required>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label id="labelhcolor" >State : </label>
                                           <input id="labeltcolor" type="text" name="State" class="form-control border-input" placeholder="" value="">
                                       </div>
                                   </div>
                                 </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelhcolor" >Representative Name : </label>
                                        <input id="labeltcolor" type="text" name="RepName" class="form-control border-input" placeholder="" value="">
                                    </div>
                                </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="labelhcolor" >Representative Contact No : </label>
                                            <input id="labeltcolor" type="number" name="RepContact" class="form-control border-input" placeholder="" value="">
                                        </div>
                                    </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label id="labelhcolor" >Representative Email : </label>
                                                <input id="labeltcolor" type="email" name="RepEmail" class="form-control border-input" placeholder="" value="">
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
