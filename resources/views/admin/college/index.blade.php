@extends('admin.layout.main')

@section('heading')
<div class="title">College List</div>
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
                              <div class="pull-left">
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
                              <div class="pull-right">
                                <a class="btn btn-success" href="{{ action('CollegeController@create')}}"> Add New College</a>
                              </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <th width="20%">College ID</th>
                                      <th width="25%">College Name</th>
                                      <th width="25%">Status</th>
                                      <th width="30%"></th>
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
                                              <div>{{$college->Status}}</div>
                                          </td>
                                          <td>

                                            <a class="btn btn-info" href="{{ action('CollegeController@show',$college['id']) }}">More</a>
                                            <a class="btn btn-warning" href="{{ action('CollegeController@edit',$college['id'])}}">Edit</a>
                                             <form style="display:inline" action="{{action('CollegeController@destroy', $college['id'])}}" method="POST">
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
