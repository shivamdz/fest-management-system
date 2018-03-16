@extends('events.layout.main')

@section('heading')
<div class="title">Participants List</div>
@endsection

@section('content')
<div class="form-group">
  <form method="post" action="{{action('IndividualEventController@store')}}" >
    {{csrf_field()}}
      
  
    <div class="form-group row">	
      
     
<div class="content">

            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <!-- <th width="15%">Team ID</th> -->
                                      <th width="15%">Participant ID</th>
                                      <th width="20%">Participant Name</th>
                                      <th width="20%">Participant No</th>
                                      <th width="20%">College ID</th>
                                      <th width="25%">Status(Present)</th>
                                      <th width="30%"></th>
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>
                                  @foreach($participants as $participant)
                                      <tr>
                                          <!-- <td class="table-text" rowspan="2">
                                              <div>{{$participant->TeamId}}</div>
                                          </td> -->
                                          <td class="table-text">
                                              <div>{{$participant->PartiId}}</div>
                                          </td>
                                          <td class="table-text">
                                              <div>{{$participant->PartiName}}</div>
                                          </td>
                                              
                                          <td class="table-text">
                                              <div>{{$participant->PartiNo}}</div>
                                          </td>
                                          
                                          <td class="table-text">
                                              <div>{{$participant->Col_id}}</div>
                                          </td>
                                          <td>
                                            <div>
                                             
                                              <input type="checkbox" name='isPresent[]' value="{{$participant->id}}">
                                             
                                             
                                           </div>
                                          </td>  

                                      </tr>
                                  @endforeach
                                </tbody>
                              </table>

                              
                      <div class="text-center">
                                     <button type="submit" class="btn btn-info btn-fill btn-wd">UPDATE</button>
                                 </div>
                                 <div class="clearfix"></div>
               
                  </div>
                  </div>
                  </div>
                  </div>

            
        </div>

</div>

</div>

       @endsection

