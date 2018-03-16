@extends('parti.layout.main')

@section('body')

<div class="wrapper">
    <div class="page-header section-dark" style="background-image: url('/parti-assets/img/background.jpeg');">
        <div class="filter"></div>
    <div class="content-center">
      <div class="container ">
        <label class="label-college presentation-subtitle ">Select College :
        <select class="" name="">
        <option value="hello">Christ </option>
        <option value="hello">Jain University</option>
        <option value="hello">Pes University</option>
        </select>
      </label>s
        <h5 class="category category-absolute ">
      <a class="btn btn-outline-success btn-lg btn-college " href="{{ url('/fest/college/event') }}">NEXT</a>
      </h5>
      </div>
  </div>

</div>
</div>

@endsection
