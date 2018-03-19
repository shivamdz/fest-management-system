@extends('admin.layout.main')

@section('heading')
<div class="title">Event Head List</div>
@endsection

@section('content')
  <div class="col-lg-12">
    @if(Session::has('success_msg'))
    <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif
  </div>

        <div class="content">
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header text-center">
                              <h3 class="title">Send Mail</h3>

                            </div>
                            <div class="content">
                              <br><br>
                              <a class="btn btn-info btn-lg" href="{{ action('NotifyController@create')}}">CUSTOM MAIL</a>
                            </div>
                          </div>
                    </div>
                  </div>
            </div>

@endsection
