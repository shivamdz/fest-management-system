@extends('admin.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('AdminParticipantsController@index') }}">BACK</a>
@endsection

@section('content')



<div class="col-lg-12">

    <div class="form-group row">

      <div class="col-lg-12 col-md-12">
                     <div class="card" style="color: #000000;">

                         <div class="header">
                             <center><h3 class="title"> Events List</h3></center>
                         </div>
                         <div class="content">
                           <form action="{{action('AdminParticipantsController@updateinfo',$id)}}" method="POST">
                           {{csrf_field()}}
                           <div id="accordion" role="tablist">

                             @foreach($lists as $list)

                             <div class="panel panel-default">
                               <div class="panel-heading" role="tab">
                                 <h6 class="mb-0">
                                   <a data-toggle="collapse" href="#collapse{{$list->EventId}}" aria-expanded="true" aria-controls="collapse{{$list->EventId}}">
                                     {{$list->EventName}}
                                     <i class="ti-arrow-circle-down"></i>
                                   </a>
                                 </h6>
                               </div>

                               <div id="collapse{{$list->EventId}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="container-fluid">
                                  <div class="row">
                                    @php($t = 0)
                                    @php ($MTeam = $list->MaxTeam)
                                    @php ($MParti = $list->MaxParti)
                                    @php ($i = 1)
                                    @while($i <= $MTeam)

                                <div class="col-md-6">
                                   <div class="info">
                                     <h4 class="info-title text-center">Team {{$i}} </h4>
                                       @php ($j = 1)
                                       @while($j <= $MParti)
                                       @php ($flag = 0)
                                       <div class="form-group">
                                         <label for="exampleFormControlSelect1">Name:</label>
                                           <select class="{{$list->EventId}} form-control" id="{{$list->EventId}}[{{$i}}][{{$j}}]" name="{{$list->EventId}}[{{$i}}][{{$j}}]" onchange="update(this)" onfocus="deselect(this)">
                                             <option value="0">Select Your Name</option>
                                             @php ($n=1)
                                             @foreach($participants as $participant)

                                             <option id="{{$n}}" value="{{$participant->id}}"
                                                @if( count($team[$list->EventId]) > 0 and count($team[$list->EventId]) >= $t+1 and $flag === 0)
                                                    @if($team[$list->EventId][$t]->TeamId === $i and $team[$list->EventId][$t]->PartiId === $participant->PartiId )
                                                       {{'selected="selected"'}}
                                                       @php($flag = 1)
                                                       @php($t++)
                                                    @endif
                                                @endif
                                                >{{$participant->PartiName}} - {{$participant->PartiNo}}</option>
                                             @php ($n++)
                                             @endforeach
                                           </select>
                                       </div>
                                       @php ($j++)
                                       @endwhile
                                     </div>
                                   </div>


                                   @php ($i++)
                                   @endwhile

                                     </div>
                                   </div>


                                   <br><br>




                                 </div>
                               </div>

                                 @endforeach




                             </div>
                            <br>
                            <div class="text-center">
                             <input type="submit" class="btn btn-info btn-fill btn-wd  " value="Update">
                           </div>

                           </form>

                           </div>

                     </div>
                 </div>
               </div>

</div>


@endsection
