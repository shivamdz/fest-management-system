@extends('parti.layout.main')

@section('body')

<div class="wrapper">
    <div class="page-header section-dark" style="background-image: url('/parti-assets/img/background.jpeg');">
        <div class="filter"></div>
    <div class="content-center">
      <div class="container">
        <div class="title-brand">
          <h2 class="presentation-title animated slideInLeft">Interface</h2>
          <!-- <div class="fog-low">
            <img src="/parti-assets/img/fog-low.png" alt="">
          </div>
          <div class="fog-low right">
            <img src="/parti-assets/img/fog-low.png" alt="">
          </div> -->
        </div>
        <h2 class="presentation-subtitle text-center animated slideInLeft ">One Line Fest Description !!</h2>
      </div>
    </div>
           <h5 class="category category-absolute  animated slideInRight">
      <a class="btn btn-outline-success btn-lg" href="{{ url('/fest/college') }}">REGISTER</a>
     </h5>
  </div>
</div>
@endsection
