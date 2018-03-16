@extends('events.layout.main')

@section('heading')
<div class="title">Volunteer List</div>
@endsection

@section('content')
<div class="content">
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <th width="30%">Volunteer ID</th>
                                      <th width="35%">Volunteer Name</th>
                                      <th width="35%">Volunteer number</th>
                                      
                                     
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>
                                  @foreach($volunteers as $volunteer)
                                      <tr>
                                          <td class="table-text">
                                              <div>{{$volunteer->VolId}}</div>
                                          </td>
                                          <td class="table-text">
                                              <div>{{$volunteer->VolName}}</div>
                                          </td>
                                              <td class="table-text">
                                              <div>{{$volunteer->VolNo}}</div>
                                          </td>
                                          </td>
                                              
                                          
                                      </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>


                </div>
            </div>
        </div>
@endsection

        