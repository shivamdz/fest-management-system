@extends('events.layout.main')

@section('heading')
<div class="title">Fest Schedule</div>
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
                                      <!-- <th width="15%">Team ID</th> -->
                                      
                                      <th width="25%">Event Name</th>
                                      <th width="25%">Event Venue</th>
                                      <th width="25%">Event Start Date and Time</th>
                                      <th width="25%">Event End Date and Time</th>
                                      <th width="30%"></th>
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>
                                  @foreach($schedule as $schedule)
                                      <tr>
                                          
                                          
                                          <td class="table-text">
                                              <div>{{$schedule->EventName}}</div>
                                          </td>

                                          <td class="table-text">
                                              <div>{{$schedule->EventVenue}}</div>
                                          </td>
                                          
                                          <td class="table-text">
                                              <div>{{$schedule->EventStartDate}}</div>
                                          </td>
                                         
                                          <td class="table-text">
                                              <div>{{$schedule->EventEndDate}}</div>
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

