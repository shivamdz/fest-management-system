@extends('events.layout.main')

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
                                     
                                 @foreach($left as $lefts)
                                  @if($lefts->Result !=0)
                                 <tr>
                                    <td class="table-text">
                                             
                                        <div > {{$lefts->TeamId}} </div>
                                    </td>
                                         
                                    <td class="table-text">
                                             
                                        <div >{{$lefts->id}} </div>
                                    </td>
                                    <td class="table-text">
                                             
                                        <div >{{$lefts->Result}} </div>
                                    </td>
                                 </tr>
                                </tbody>
                                @endif
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