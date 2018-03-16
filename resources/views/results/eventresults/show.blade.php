@extends('results.layout.main')

@section('heading')
<a class="btn btn-info btn-fill" href="{{ action('ResultController@index') }}">BACK</a>

@endsection

@section('content')
{{csrf_field()}}
<style>
#labelhcolor {
color: #595959;
}
#labeltcolor {
font-style:italic;
}
</style>

<div class="col-lg-12">

    <div class="form-group row">

      <div class="col-lg-12 col-md-12">
                     <div class="card" style="color: #000000;">
                       <strong>
                         <div class="header">
                             <center><h3 class="title"> {{$result[0]['EventName']}} </h3></center>
                         </div>
                         <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                  <thead>
                                      <!-- <th width="15%">Team ID</th> -->
                                      <th width="15%">TEAM ID</th>
                                      <th width="20%">Participant ID</th>
                                      <th width="20%">Position</th>
                                      
                                  </thead>

                                  <!-- Table B}}ody -->
                                  <tbody>
                                dd{{$preg}};
                                @foreach($preg as $key => $pregs)
                                @php(print_r($pregs))
                                 @foreach($pregs as $k => $v)
                                 <!-- @php(print_r($v)) -->
                                 <tr>
                                    <td class="table-text">
                                             
                                        <div {{$v}}</div>
                                    </td>
                                         
                                    <td class="table-text">
                                             
                                        <div {{$v}}</div>
                                    </td>
                                    <td class="table-text">
                                             
                                        <div {{$v}}</div>
                                    </td>
                                 </tr>
                                @endforeach
                                @endforeach
                                 </div></table>
                                     </form>
                               </strong>
                           </div>

                     </div>
                 </div>
               </div>

</div>
@endsection