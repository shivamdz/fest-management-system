@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('AdminParticipantsController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')

@if($status != null)

<div class="col-lg-12">
  <form method="post" action="{{action('AdminParticipantsController@statusstore',$id)}}" >
    <div class="form-group row">
    </div>
      {{csrf_field()}}
      <input type="hidden" name="ColId" value="{{$id}}">
      <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="header">
                             <center><h3 class="title"><b>Status</b></h3></center>
                         <div class="content">
                             <form>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <label id="labelhcolor" >Fees Paid:</label> &nbsp; &nbsp;
                                        <input id="labeltcolor"  type="checkbox" name="fee"  value="1" @if($status->FeeStatus === 1){{'Checked'}} @endif >
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label id="labelhcolor" >Any Comments : </label>
                                        <textarea rows="4" name="comment" class="form-control border-input" placeholder="" value="">{{$status->Comment}}</textarea>
                                    </div>
                                </div>
                                  </div>
                              </div>
                              <br>
                                 <div class="text-center">
                                     <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
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
@endif
@endsection
