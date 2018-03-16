@extends('parti.layout.main')

@section('body')
<!-- 'errors','lists','names','emails','contacts','id','c') -->
@if(null !== session('lists'))
@php($lists = session('lists'))
@endif
@if(null !== session('names'))
@php($names = session('names'))
@endif
@if(null !== session('emails'))
@php($emails = session('emails'))
@endif
@if(null !== session('contacts'))
@php($contacts = session('contacts'))
@endif
@if(null !== session('id'))
@php($id = session('id'))
@endif
@if(null !== session('c'))
@php($c = session('c'))
@endif



<div class="page-header-col header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('/parti-assets/img/bg2.jpg');"> -->
      <div class="container">
          <div class="row">
              <div class="col-md-8 ml-auto mr-auto">
                   <div class="brand">
                      <h3 class="text-uppercase">{{session('CollegeName')}}</h3>
                  </div>
              </div>
          </div>
    </div>
</div>

<div class="main main-raised">
     <div class="section section-basic">
         <div class="container">
           <div class="title text-center">
               <h3>Select Events</h3>
               @php($f = 0)
               @foreach ($errors as $error)
                   @php($f = 1)
               @endforeach

               @if ($f == 1)
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif

           </div>
           <br><br>
           <!-- <div class="card" style="width: 20rem;">
<img class="card-img-top" src="/parti-assets/img/index.svg" alt="Card image cap">
<div class="card-body">
<h4 class="card-title">Treasure Hunt</h4>
<p class="card-text">Some Rules Goes here</p>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#event1" >Take Part</a>
</div>
</div> -->


<form action="{{action('RegController@store')}}" method="POST">
<!--   ***************************  Event DropDown Starts Here  *******************************  -->
{{csrf_field()}}

@php ($n=1)
@foreach($names as $name)
<input type="hidden" name="name[{{$n}}]" value="{{$name}}">
<input type="hidden" name="contact[{{$n}}]" value="{{$contacts[$n]}}">
<input type="hidden" name="email[{{$n}}]" value="{{$emails[$n]}}">
@php ($n++)
@endforeach

<input type="hidden" name="colName" value="{{$id}}">


<div id="accordion" role="tablist">

  @foreach($lists as $list)

  <div class="card card-collapse">
    <div class="card-header" role="tab">
      <h6 class="mb-0">
        <a data-toggle="collapse" href="#collapse{{$list->EventId}}" aria-expanded="true" aria-controls="collapse{{$list->EventId}}">
          {{$list->EventName}}
          <i class="material-icons">keyboard_arrow_down</i>
        </a>
        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#rules{{$list->EventId}}" >Rules</a>
      </h6>
    </div>


    <div id="collapse{{$list->EventId}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
     <div class="container-fluid">
       <div class="row">
         @php ($MTeam = $list->MaxTeam)
         @php ($MParti = $list->MaxParti)
         @php ($i = 1)
         @while($i <= $MTeam)

     <div class="col-md-6">
        <div class="info">
          <h4 class="info-title text-center">Team {{$i}}</h4>
            @php ($j = 1)
            @while($j <= $MParti)
            <div class="form-group">
              <label for="exampleFormControlSelect1">Name:</label>
                <select class="{{$list->EventId}} form-control" id="{{$list->EventId}}[{{$i}}][{{$j}}]" name="{{$list->EventId}}[{{$i}}][{{$j}}]" onchange="update(this)" onfocus="deselect(this)">
                  <option value="0">Select Your Name</option>
                  @php ($n=1)
                  @foreach($names as $name)
                  <option id="{{$n}}" value="{{$n}}">{{$name}} - {{$contacts[$n]}}</option>
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

<!-- ********************************  Event DropDown Ends Here ********************************* -->
<div class="text-center">
<input type="submit" class="btn btn-primary" value="Submit">
<!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#sub" >Submit</a> -->

<div class="modal fade" id="sub" role="dialog" data-backdrop="false">
   <div class="modal-dialog" >
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" >Confirmation</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
            You cannot change once's submitted. <br>
            Are you sure you want to submit ?
       </div>
       <div class="modal-footer">
         <button type="submit" class="btn btn-secondary">YES</button>
         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>

</div>
</div>

</form>

          </div>
     </div>


     @foreach($lists as $list)
    <!-- data-backdrop="false" -->
       <div class="modal fade" id="rules{{$list->EventId}}" role="dialog" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >{{$list->EventName}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <pre>{{$list->Rules}}</pre>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach

<script>


let previd;

function deselect(ele)
{
  let id = ele.id;
  let cb = document.getElementById(id).options.selectedIndex;
  previd = cb;

}


function update(ele)
{

  let id = ele.id;
  // alert(id.substring(0, id.indexOf('[')));
  // alert(id);
  let className = id.substring(0, id.indexOf('['));
  let cb = document.getElementById(id).options.selectedIndex;
    // document.getElementById("EVT1[1][2]").options[2].disabled;

    // $("select#EVT1[1][2] option").prop('disabled', false).filter("#1").prop('disabled', true);



  @foreach($lists as $list)

  if("{{$list->EventId}}" == className)
  {
  @php ($MTeam = $list->MaxTeam)
  @php ($MParti = $list->MaxParti)
  // console.log("{{$MTeam}}");
  // console.log("{{$MParti}}");
     for(i = 1; i <= {{$MTeam}} ; i++)
     {
       for(j = 1; j <= {{$MParti}} ; j++)
       {
        //  alert("{{$list->EventId}}["+i+"]["+j+"]");
          let curid = "{{$list->EventId}}["+i+"]["+j+"]";
          if(curid != id)
          {
            var $dropdown = $("select[id='"+curid+"']");

            $dropdown.find('option[id="'+previd+'"]').prop("disabled", false);
            // $dropdown.find('option[id="' +  + '"]').prop("disabled", true);
            $dropdown.find('option[id="' + cb + '"]').prop("disabled", true);



          }
       }
     }
  }
  @endforeach



}





</script>

@endsection
