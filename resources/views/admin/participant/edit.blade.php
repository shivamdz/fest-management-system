@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('AdminParticipantsController@index') }}">BACK</a>
@endsection

@section('content')

<div class="col-lg-12">
  <form method="post" action="{{action('AdminParticipantsController@update',$id)}}" >
    <div class="form-group row">
      {{csrf_field()}}
      {{ method_field('PUT') }}


      <div class="col-lg-12 col-md-12">
                     <div class="card" style="color: #000000;">

                         <div class="header">
                             <center><h3 class="title"> Participants List</h3></center>
                         </div>
                         <div class="content">

                           <div class="content table-responsive table-full-width">
                               <table class="table table-striped">
                                 <thead>
                                     <th width="30%">Name</th>
                                     <th width="40%">Email</th>
                                     <th width="30%">Contact No</th>
                                 </thead>

                                 <!-- Table Body -->
                                 <tbody>
                                 @foreach($participants as $participant)
                                       <input type="hidden" name="id[]" value="{{$participant->id}}">
                                     <tr>
                                         <td class="table-text">
                                           <div class="form-group">
                                               <label id="labelhcolor" >Name : </label>
                                               <input id="labeltcolor" type="text" name="name[]" class="form-control border-input" placeholder="" value="{{$participant->PartiName}}" required>
                                           </div>
                                         </td>
                                         <td class="table-text">
                                           <div class="form-group">
                                               <label id="labelhcolor" >Email : </label>
                                               <input id="labeltcolor" type="email" name="email[]" class="form-control border-input" placeholder="" value="{{$participant->PartiEmail}}" required>
                                           </div>
                                         </td>
                                          <td class="table-text">
                                               <div class="form-group">
                                                   <label id="labelhcolor" >Contact No : </label>
                                                   <input id="labeltcolor" type="text" name="contact[]" class="form-control border-input" pattern="^[1-9]\d{9}$" maxlength="10" value="{{$participant->PartiNo}}" required>
                                               </div>
                                         </td>
                                     </tr>
                                 @endforeach
                               </tbody>
                             </table>
                           </div>
                           <div class="text-center">
                               <button type="submit" class="btn btn-info btn-fill btn-wd">Update</button>
                           </div>
                           <br>
                           <div class="clearfix"></div>

                           </div>

                     </div>
                 </div>
               </div>
</form>
</div>
@endsection
