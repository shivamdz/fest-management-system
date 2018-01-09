@extends('admin.layout.main')


@section('content')

<!-- <script type="text/javascript">
  $(document).ready(function(){


      demo.initChartist();

      $.notify({
          icon: 'ti-gift',
          message: "Hellooo"

        },{
            type: 'success',
            timer: 4000
        });

  });
</script> -->

dashboard
@endsection

@section('notificationpopup')
<script  type="text/javascript">
    	$(document).ready(function(){

        // alert('hello');
        //  $.notify("Hello World");
          // alert('hello');
          // demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });



    	});
</script>

   @endsection
