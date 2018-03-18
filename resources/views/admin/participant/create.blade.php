@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('AdminParticipantsController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')

<div class="col-lg-12">
  <form method="post" action="{{action('AdminParticipantsController@store')}}" >
    <div class="form-group row">
    </div>
      {{csrf_field()}}
      <input type="hidden" name="ColId" value="{{$id}}">
      <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="header">
                             <center><h3 class="title"><b>Add New Participant</b></h3></center>
                         <div class="content">
                             <form>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelhcolor" >Name : </label>
                                        <input id="labeltcolor" type="text" name="name" class="form-control border-input" placeholder="" value="" required>
                                    </div>
                                </div>
                                  </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label id="labelhcolor" >Email : </label>
                                                <input id="labeltcolor" type="email" name="email" class="form-control border-input" placeholder="" value="" required>
                                            </div>
                                        </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="labelhcolor" >Contact No : </label>
                                                    <input id="labeltcolor" type="text" name="contact" class="form-control border-input" pattern="^[1-9]\d{9}$" maxlength="10" placeholder="" required>
                                                </div>
                                            </div>
                                              </div>
                              </div>
                                 <div class="text-center">
                                     <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                                 </div>
                                 <br>
                                 <div class="clearfix"></div>
                             </form>
                         </div>
                     </div>
                 </div>
               </div>

  </form>
</div>
@endsection
