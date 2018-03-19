@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('NotifyController@index') }}">BACK</a>
<!-- <b>Create New Event</b> -->
@endsection

@section('content')

<div class="col-lg-12">
  <form method="post" action="{{action('NotifyController@store')}}" >
    <div class="form-group row">
      {{csrf_field()}}

      <div class="col-lg-12 col-md-12">
                     <div class="card">
                         <div class="header text-center">
                            <h3 class="title"><b>Send Custom Mail To All</b></h3>
                         </div>
                         <div class="content">
                             <form>
                               <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                           <label id="labelhcolor">Subject : </label>
                                           <input id="labeltcolor" type="text" name="subject" class="form-control border-input" value="" required>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label id="labelhcolor">Message : </label>
                                             <textarea rows="6" name="msg" class="form-control border-input" placeholder="Press Enter to display in new line"></textarea>
                                         </div>
                                     </div>
                               </div>
                           <div class="row">
                                 <div class="col-md-12">
                                   <div class="form-group">
                                   <label>Attachment (pdf) :</label>
                                   <input type="file" name="file" class="form-control border-input" placeholder="Upload Event logo here" accept="pdf/*" value="">
                                   </div>
                                 </div>
                             </div>

                              <br>
                                 <div class="text-center">
                                     <button type="submit" class="btn btn-info btn-fill btn-wd">Send</button>
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
