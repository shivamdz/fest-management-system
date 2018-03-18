@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('AdminParticipantsController@index') }}">BACK</a>
@endsection

@section('content')



<div class="col-lg-12">

    <div class="form-group row">

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
                                     <tr>
                                         <td class="table-text">
                                             <div>{{$participant->PartiName}}</div>
                                         </td>
                                         <td class="table-text">
                                             <div>{{$participant->PartiEmail}}</div>
                                         </td>
                                             <td class="table-text">
                                             <div>{{$participant->PartiNo}}</div>
                                         </td>
                                     </tr>
                                 @endforeach
                               </tbody>
                             </table>
                           </div>


                           </div>

                     </div>
                 </div>
               </div>

</div>
@endsection
