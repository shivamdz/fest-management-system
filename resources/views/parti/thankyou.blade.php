@extends('parti.layout.main')

@section('body')

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
               <h2>Registered Successfully</h2>
           </div>
         </div>
      </div>
</div>

<!-- <h1>Registered Successfully</h1> -->
@endsection
