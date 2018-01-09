@extends('admin.layout.main')

@section('heading')
<div class="title">Event List</div>
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
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                              <!-- <h3 class="title">Event List</h3> -->
                              <div class="pull-right">
                                <a class="btn btn-success" href="{{ action('EventController@create')}}"> Add New Event</a>
                              </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <th width="20%">Event ID</th>
                                      <th width="25%">Event Name</th>
                                      <th width="25%">Event Head Name</th>
                                      <th width="30%"></th>
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>
                                  @foreach($events as $event)
                                      <tr>
                                          <td class="table-text">
                                              <div>{{$event->EventId}}</div>
                                          </td>
                                          <td class="table-text">
                                              <div>{{$event->EventName}}</div>
                                          </td>
                                              <td class="table-text">
                                              <div>{{$event->Rules}}</div>
                                          </td>
                                          <td>

                                            <a class="btn btn-info" href="{{ action('EventController@show',$event['id']) }}">More</a>
                                            <a class="btn btn-warning" href="{{ action('EventController@edit',$event['id'])}}">Edit</a>
                                            <!-- <a class="btn btn-danger" href="{{ action('EventController@destroy',$event['id'])}}" onclick="return confirm('Are you sure to delete?')">Delete</a> -->
                                             <form style="display:inline" action="{{action('EventController@destroy', $event['id'])}}" method="POST">
                                                   {{csrf_field()}}
                                                   {{ method_field('DELETE') }}
                                                   <button class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" type="submit">Delete</button>
                                             </form>
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

<!-- <script type="text/javascript">
  $(document).ready(function(){

      //  demo.showNotification('top','center');
      //  $.write("hh {{ Session::get('success_msg')}}");


      demo.initChartist();

      $.notify({
          icon: 'ti-gift',
          message: "yghagb {{ Session::get('success_msg')}}"

        },{
            type: 'success',
            timer: 4000
        });

  });
</script> -->

@endsection
