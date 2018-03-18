@extends('events.layout.main')

@section('heading')
<div class="title">Participants List</div>
@endsection

@section('content')
@if(!empty($participants))


<div class="content">
  <div class="container-fluid">
  <div class="form-group">
    <form method="post" action="{{action('IndividualEventController@store')}}" >
      {{csrf_field()}}
                                  <input type="hidden" name="name" value="{{$id}}">


      <div class="form-group row">

            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <th width="20%">Participant ID</th>
                                      <th width="20%">Participant Name</th>
                                      <th width="20%">Participant No</th>
                                      <th width="20%">College ID</th>
                                      <th width="20%">Status(Present)</th>
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
                                              <input type="checkbox" name='IsPresent[]' value="{{$participant->id}}">
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

</div>

@else

<div class="content">
  <div class="container-fluid">

    <div style="text-align: justify">
     <h2 class="title text-center">Looks Like Everyone is Present</h2>
    </div>
  </div>
</div>

      @endif

@endsection
