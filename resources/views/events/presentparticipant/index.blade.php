@extends('events.layout.main')

@section('heading')
<div class="title">Present Participants</div>
@endsection

@section('content')

@if(null !== session('sub'))
@php($sub = session('sub'))
@endif

@if($sub === 1)

<div class="content">
  <div class="container-fluid">

    <div style="text-align: justify">
     <h2 class="title text-center">Result is Submitted.Please Contact Admin for any changes.</h2>
    </div>
  </div>
</div>


@else

@if(!empty($pregs))

<div class="content">

            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <form method="post" action="{{action('IndividualEventController@updateresult')}}" onsubmit="return Validation()">
                            {{csrf_field()}}
                            <input type="hidden" name="name" value="{{$id}}">

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">

                                  @php($ar=[])
                                  @php($span=[])

                                  @for($i=0; $i < count($pregs);$i++)
                                   @php($ar[$i]=$pregs[$i]->TeamId)
                                  @endfor

                                  @php($a=(array_count_values($ar)))

                                  @php($k=1)

                                  @for($i=1;$i <= count($a);$i++)

                                   @php($span[$k]=$a[$i])
                                   @php($k++)
                                       @php($temp = $a[$i])
                                     @while($temp > 1)
                                       @php($span[$k]=0)
                                       @php($k++)
                                       @php($temp--)
                                     @endwhile

                                  @endfor



                                  <thead>
                                      <th width="15%">Participant ID</th>
                                      <th width="25%">Name</th>
                                      <th width="20%">Contact No</th>
                                      <th width="10%">Team ID</th>
                                      <th width="10%">First</th>
                                      <th width="10%">Second</th>
                                      <th width="10%">Third</th>
                                  </thead>
                                  <!-- Table Body -->
                                  <tbody>
                                      @php($last = 0)
                                      @php($flag = 1)
                                      @php($k = 1)
                                       @for($i=0;$i < count($pregs);$i++)
                                        <tr>
                                            @if($span[$k] === 0)

                                            <td class="table-text" >
                                              {{$presents[$i]->PartiId}}
                                            </td>
                                            <td class="table-text" >
                                              {{$presents[$i]->PartiName}}
                                            </td>
                                            <td class="table-text" >
                                              {{$presents[$i]->PartiNo}}
                                            </td>


                                              @else

                                             <td class="table-text" >
                                               {{$presents[$i]->PartiId}}
                                             </td>
                                             <td class="table-text" >
                                               {{$presents[$i]->PartiName}}
                                             </td>
                                             <td class="table-text" >
                                              {{$presents[$i]->PartiNo}}
                                              </td>

                                              <td class="table-text" rowspan="{{$span[$k]}}">
                                                {{$pregs[$i]->TeamId}}
                                              </td>

                                               <td class="table-text" rowspan="{{$span[$k]}}">
                                                <input type="radio" id="rf{{$i}}" name="first" value="{{$pregs[$i]->TeamId}}" required> First<br>
                                               </td>

                                               <td class="table-text" rowspan="{{$span[$k]}}">
                                                <input type="radio" id="rs{{$i}}" name="second" value="{{$pregs[$i]->TeamId}}" required> Second<br>
                                               </td>

                                               <td class="table-text" rowspan="{{$span[$k]}}">
                                                <input type="radio" id="rt{{$i}}" name="third" value="{{$pregs[$i]->TeamId}}" required> Third<br>
                                               </td>

                                              @endif
                                              @php($k++)
                                         </tr>
                                         @endfor






                                  </tbody>
                                </table>


                                <div class="text-center">
                                     <button type="submit" class="btn btn-info btn-fill btn-wd">UPDATE</button>
                                 </div>
                                 <div class="clearfix"></div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            @else

            <div class="content">
              <div class="container-fluid">

                <div style="text-align: justify">
                 <h2 class="title text-center">Oops No one is present</h2>
                </div>
              </div>
            </div>

                  @endif
<script>
function Validation()
{

for(i=0;i < {{sizeof($pregs)}};i++)
{
   let v = document.getElementById("rf"+i+"");
   if(v)
   {
rf = document.getElementById("rf"+i+"").checked;
console.log(rf);
rs = document.getElementById("rs"+i+"").checked;
console.log(rs);
rt = document.getElementById("rt"+i+"").checked;
console.log(rt);


if((rf == true && rs == true)||(rs == true && rt == true)||(rt == true && rf == true))
{
    alert("Same Team Can't have two positions");
    return false;
}
}
}
return true;
}
</script>

@endif

       @endsection
