@extends('results.layout.main')

@section('heading')
<div class="title">Event Results</div>
@endsection

@section('content')
<!-- <div class="row"> -->
  <div class="col-lg-12">
    @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif
  </div>

    @if(!empty($events))
        <div class="content">
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                              
                              
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      
                                      <th width="25%">Event Name</th>
                                      
                                      <th width="30%"></th>
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>
                                  @foreach($events as $event)
                                      <tr>
                                          
                                          <td class="table-text">
                                              <div>{{$event->EventName}}</div>
                                          </td>
                                             

                                           <td> <a class="btn btn-info" href="{{ action('ResultController@show',$event['id']) }}">View Result</a>
                                           </td>
                                            
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
     

@endsection
