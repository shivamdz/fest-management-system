@extends('parti.layout.main')

@section('body')

@if(null !== session('count'))
@php($count = session('count'))
@endif


{{session(['CollegeName'=>$count->CName])}}
{{session(['Cid'=>$count->id])}}
<div class="page-header-col header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('/parti-assets/img/bg2.jpg');"> -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                     <div class="brand">
                        <h3 class="text-uppercase">{{$count->CName}}</h3>
                    </div>
                </div>
            </div>
        </div>
     </div>
<!-- <div id="nav-col">
</div> -->
<div class="main main-raised">
    <div class="section section-basic">
        <div class="container">
          <button type="button" class="btn pull-right" data-toggle="tooltip" data-placement="bottom" title="@if($count->CTotal == 20) Sorry No Registration Left @else Hurry Only {{20-$count->CTotal}} registrations Left @endif" data-container="body">Registration: {{$count->CTotal}}/20</button>
          <div class="space-20"></div>
          <div id="inputs">
            @if($count->CTotal < 20)
                   <div class="title">
                       <h3>Enter Participants Info</h3>
                   </div>
                   @php($f = 0)

                   @if(null !== session('erremail') or null !== session('errcontact'))
                      @php($f = 2)
                   @endif

                   @if($f == 2)
                   <br><br>
                   <div class="alert alert-danger">
                     Duplicate Input Found For :
                       <ul>
                           @foreach (session('erremail') as $email)
                               <li>{{ $email }}</li>
                           @endforeach
                           @foreach (session('errcontact') as $contact)
                               <li>{{ $contact }}</li>
                           @endforeach
                       </ul>

                       <br><br>
                       Kindly enter email and contact number unique to each participant.
                   </div>
                   @endif

                   @foreach ($errors as $error)
                       @php($f = 1)
                   @endforeach

                   @if ($f == 1)
                   <br><br>

                   @for($i=2;$i<=count(old('name'));$i++)

                   <script>
                   window.onload = function() {
                       add_row();
                     }
                   </script>
                   @endfor
                       <div class="alert alert-danger">
                         Already Registered Entries Found :
                           <ul>
                               @foreach ($errors as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>

                           <br><br>
                           Please Contact Support for any changes if you have already registered.
                       </div>

                   @endif


            <!-- <button type="button" id="openmodal" class="btn btn-primary" data-toggle="modal" data-target="#error"></button> -->







                   <form method="post" action="{{ action('RegController@getEventList') }}" onsubmit="return validateForm()">
                     {{csrf_field()}}
                     <input type="hidden" value="{{$count->id}}" name="id"/>

                    <table class="table borderless" id="tab_logic">
                      <!-- <th>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Contact No</td>
                      </th> -->

                      <tbody>
                    <tr id='addr0'>
                           <td>
                             <div class="form-group">
                               <label class="bmd-label-floating">Name</label>
                               <input type="text" name="name[1]" id="name[1]" class="form-control" value="{{old('name.1')}}"pattern='[a-zA-Z ]+' title='Only Alphabets are allowed' required >
                           </div></td>
                           <td><div class="form-group">
                               <label class="bmd-label-floating">Email</label>
                               <input type="email" name="email[1]" class="form-control" value="{{old('email.1')}}" required>
                               <span class="bmd-help">We'll never share your email with anyone else.</span>
                           </div></td>
                           <td><div class="form-group">
                               <label class="bmd-label-floating">Contact No</label>
                               <input type="text" name="contact[1]" class="form-control" maxlength="10" value="{{old('contact.1')}}" title="Please enter correct Mobile no." required>
                               <span class="bmd-help">We'll never share your contact with anyone else.</span>
                           </div></td>
                     <tr>

                     </tbody>
                     <tfoot>
                       <tr>
                         <td>
                           <a onclick="add_row()" id="btn-color-white"class="btn btn-default pull-left">Add Row</a>
                         </td>
                         <td class="text-center">
                           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SaveChanges">Submit</button> -->
                           <input type="submit" class="btn btn-primary" value="Next">


                         </td>
                         <td>
                           <a onclick="delete_row()" id="btn-color-white" class="btn btn-default pull-right">Delete Row</a>
                         </td>
                       </tr>
                     </tfoot>

                   </table>
                   </form>
                   @else
                    <h2>Sorry , Max Registration Reached from your college.</h2>
                  @endif

                   </div>

        </div>
    </div>
</div>
<!--
<div class="modal fade" id="SaveChanges" role="dialog" >
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" >Confirmation</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         Please Check Before Saving.
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <input type="submit" class="btn btn-primary" value="Save changes">
       </div>
     </div>
   </div>
 </div> -->

<script>


var i=1;


function add_row()
{
  // alert("inside add row");
    if(i<{{21-$count->CTotal}})   // Change max no. of participants here
        {
          // alert(i);

 $('#addr'+i).html('<td><div class="form-group"><input name="name['+i+']" id="name['+i+']" type="text" value="{{old("name.'+i+'")}}" placeholder="Name" class="form-control" pattern="[a-zA-Z ]+" title="Only Alphabets are allowed" required ></div></td><td><div class="form-group"><input name="email['+i+']" type="email" placeholder="Email" class="form-control" value="{{old("email.'+i+'")}}" required></div></td><td><div class="form-group"><input name="contact['+i+']" type="text" value="{{old("contact.'+i+'")}}" placeholder="Contact No" class="form-control" maxlength="10" pattern="\\d{10}" title="Please enter correct Mobile no." required><span class="bmd-help">We will never share your contact with anyone else.</span></div></td>');

 $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
 i++;
        }
    else
    {
    alert("Max {{21-$count->CTotal-1}} Participants Allowed");
    }
}


function delete_row(){
  if(i>1){
$("#addr"+(i-1)).html('');
i--;
}
}

function validateForm()
{

  // alert('val');
  var name = document.getElementsById("name");
  // var email = document.getElementsByName("email[]");
  // var contact = document.getElementsByName("contact[]");
    console.log(name);
  // var counts = [];
  //   for(var i = 0; i <= name.length; i++) {
  //       if(counts[name[i]] === undefined) {
  //           counts[name[i]] = 1;
  //       } else {
  //           // alert($a[i]);
  //       }
  //   }



}


</script>

@endsection
