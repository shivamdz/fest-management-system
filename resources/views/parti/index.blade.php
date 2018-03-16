@extends('parti.layout.main')

@section('body')
<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('/parti-assets/img/bg2.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1>Fest Name.</h1>
                        <h3>Fest information goes here in one to two line (Input it from admin panel)</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="section section-basic">
            <div class="container">
                    <h3>Select Your College :</h3>
                    <form method="post" action="{{action('RegController@getCount')}}">
                        {{csrf_field()}}

                    <div class="row">

                      <div class="col-md-10">
                        <select class="selectpicker col-md-12" name="ColId">
                          @foreach($clist as $list)
                          <option value="{{$list->id}}" class="text-uppercase" data-tokens="{{$list->CName}}">{{$list->CName}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class=" col-md-2">
                      <button type="submit" class="btn btn-primary" style="margin-top:0.86em;">NEXT</button>
                      </div>
                    </div>
                  </form>

                      <!-- <div class="row">
                        <h5 id="regStu"></h5>
                      </div> -->


                <!-- <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                      <select class="col-md-12 form-control" name="EventId">
                        <option value="ID1" >Christ</option>
                        <option value="ID2">Jain University</option>
                      </select>
                    </div>
               </div> -->

            </div>
        </div>
    </div>

      <!-- <script>
$('#next').click(function(){
           $.ajax({
              type:'POST',
              url:'/fest/getCount',
              data:{'_token = <?php echo csrf_token() ?>'}
              success:function(data){
                 $("#regStu").html(data.msg);
              }
           });
         });
     </script> -->


@endsection
