@extends('admin.layout.main')

@section('heading')
<div class="title">Event Head List</div>
@endsection

@section('content')
<!-- <div class="row"> -->
  <div class="col-lg-12">
    @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif
  </div>

    @if(!empty($left))
        <div class="content">
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                              <!-- <h3 class="title">Event List</h3> -->
                              <div class="pull-right">
                                <a class="btn btn-success" href="{{ action('EventHeadController@create')}}"> Add New Event Head</a>
                              </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <th width="20%">Head ID</th>
                                      <th width="25%">Head Name</th>
                                      <th width="25%">Event Assigned</th>
                                      <th width="30%"></th>
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>
                                  @php($i=1)
                                  @foreach($left as $lefts)
                                      <tr>
                                          <td class="table-text">
                                              <div>{{$lefts->HeadId}}</div>
                                          </td>
                                          <td class="table-text">
                                              <div>{{$lefts->HeadName}}</div>
                                          </td>
                                              <td class="table-text">
                                              <div>{{$lefts->EventName}}</div>
                                          </td>
                                          <td>

                                            <a class="btn btn-info" href="{{ action('EventHeadController@show',$lefts->id) }}">More</a>
                                            <a class="btn btn-warning" href="{{ action('EventHeadController@edit',$lefts->id)}}">Edit</a>
                                             <form style="display:inline" action="{{action('EventHeadController@destroy', $lefts->id)}}" method="POST">
                                                   {{csrf_field()}}
                                                   {{ method_field('DELETE') }}
                                                   <button class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" type="submit">Delete</button>
                                             </form>
                                          </td>
                                      </tr>
                                      @php($i++)
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
