@extends('events.layout.main')

@section('heading')
<div class="title">Present Participants</div>
@endsection

@section('content')
<div class="content">
      
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @php($ar=[])
                            @for($i=0;$i<count($preg);$i++)
                             @php($ar[$i]=$preg[$i]->TeamId)
                            @endfor
                            @php($a=(array_count_values($ar)))
                                 
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <th width="25%">Team ID</th>
                                      <th width="25%">Participant ID</th>
                                      <th width="25%">First</th>
                                      <th width="25%">Second</th>
                                      <th width="25%">Third</th>
                                      <th width="30%"></th>
                                  </thead>

                                  <!-- Table Body -->
                                  <tbody>     
                                            @php(print_r($a))
                                          
                                        <tr>  
                                           @for($i=0;$i<1;$i++)
                                             
                                             @php($count=$a[$preg[$i]->TeamId])  
                                              <td class="table-text" rowspan="{{$count}}">
                                                {{$preg[$i]->TeamId}}
                                              </td> 
                                              
                                              @for($j=0;$j<$count;$j++)
                                              <td class="table-text" >
                                                <tr>
                                                <div>{{$preg[$i]->Parti_id}}</div>
                                              </tr>
                                              </td>

                                              @endfor

                                              <td class="table-text" rowspan="{{$count}}">
                                              <input type="radio" name="First" value="First"> First<br>
                                              </td>
                                              
                                              <td class="table-text" rowspan="{{$count}}">
                                              <input type="radio" name="Second" value="Second"> Second<br>
                                              </td>

                                              <td class="table-text" rowspan="{{$count}}">
                                              <input type="radio" name="Third" value="Third"> Third<br>
                                              </td>   
                                             </tr> 
                                          @endfor     
                                              
                                        
                                     
                                                 
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


       @endsection

