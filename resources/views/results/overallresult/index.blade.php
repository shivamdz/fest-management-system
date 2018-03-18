@extends('results.layout.main')

@section('heading')
<div class="title">Overall Result</div>
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
                                      <th width="30%">College Name</th>
                                      <th width="35%">Position</th>
                                      
                                      
                                     
                                  </thead>

                                  <!-- Table Body -->
                                  
                                    @foreach($left as $lefts)
                                      <tr>
                                          <td class="table-text">
                                              <div>{{$lefts->CName}}</div>
                                          </td>

                                          <td class="table-text">
                                              <div>{{$lefts->TScore}}</div>
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

        