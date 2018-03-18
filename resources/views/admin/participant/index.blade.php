@extends('admin.layout.main')

@section('heading')
<div class="title">participants List</div>
@endsection

@section('content')
<script>
#inputbcolor{
  border: 2px solid black;
}
</script>
  <div class="col-lg-12">
    @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif
  </div>

    @if(!empty($colleges))
        <div class="content">
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                              <div class="pull-right">
                              <div class="input-group" >
                                <input type="text"  class="form-control" id="labelhcolor" id="inputbcolor" placeholder="Search" id="txtSearch"/>
                                 <div class="input-group-btn">
                                   <!-- class="form-control" -->
                                   <button class="btn btn-primary btn-fill" type="submit">
                                     <span class="ti-search"></span>
                                   </button>
                                 </div>
                                </div>
                              </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <th width="15%">College ID</th>
                                      <th width="20%">College Name</th>
                                      <th width="10%">Fee Status</th>
                                      <th width="15%"></th>
                                      <th width="40%">Participants</th>
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>
                                  @foreach($colleges as $college)
                                      <tr>
                                          <td class="table-text">
                                              <div>{{$college->CId}}</div>
                                          </td>
                                          <td class="table-text">
                                              <div>{{$college->CName}}</div>
                                          </td>
                                          <td class="table-text">
                                              <div>@if($college->FeeStatus === 0){{'Not Paid'}}@else {{'Paid'}} @endif</div>
                                          </td>
                                          <td class="table-text">
                                           <a class="btn btn-success" href="{{ action('AdminParticipantsController@status',$college['id']) }}">Update</a>
                                          </td>
                                          <td>
                                            <a class="btn btn-success" href="{{ action('AdminParticipantsController@add',$college['id']) }}">Add</a>
                                            <a class="btn btn-info" href="{{ action('AdminParticipantsController@show',$college['id'])}}">View</a>
                                            <a class="btn btn-primary" href="{{ action('AdminParticipantsController@edit',$college['id'])}}">Edit</a>
                                            <a class="btn btn-warning" href="{{ action('AdminParticipantsController@event',$college['id'])}}">Modify Events</a>
                                         </td>
                                      </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                 @endif
                        </div>
                    </div>
                  </div>
            </div>
      <!-- </div> -->


@endsection
