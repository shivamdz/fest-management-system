<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!-- <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon.png')}}"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<!-- Bootstrap core CSS     -->
	<link href="{{asset('result-assets/css/bootstrap.min.css')}}" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="{{asset('result-assets/css/animate.min.css')}}" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="{{asset('result-assets/css/paper-dashboard.css')}}" rel="stylesheet"/>

	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="{{asset('result-assets/css/themify-icons.css')}}" rel="stylesheet">

	<link href="{{asset('result-assets/css/demo.css')}}" rel="stylesheet" />





	<title>RESULT PORTAL</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
          <div class="logo">
                <a class="simple-text">
                  RESULT PANEL
                </a>
            </div>

            <ul class="nav">
                
                <li {{{ (Request::is('results/eventresults') ? 'class=active' : '') }}} {{{ (Request::is('/results/eventresults') ? 'class=active' : '') }}} >
										<a href="{{{url('/results/eventresults')}}}">
												<i class="ti-pie-chart"></i>
												<p>EVENT RESULTS</p>
										</a>
								</li>
                
                <li {{{ (Request::is('results/collegeresult') ? 'class=active' : '') }}} {{{ (Request::is('/results/collegeresult') ? 'class=active' : '') }}}>
										<a href="{{{url('/results/collegeresult')}}}">
												<i class="ti-pie-chart"></i>
												<p>OVERALL RESULT</p>
										</a>
								</li>
            </ul>
    	</div>
 </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand">@yield('heading')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
                      						<li>



                            <a href="#">
								<i class="ti-arrow-circle-right"></i>
								<p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">

                @yield('content')

                </div>
            </div>
        </div>

</div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <!-- <ul>

                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                    </ul> -->
                </nav>
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.github.com">Github</a>
                </div>
            </div>
        </footer>


</div>

</body>

        <!--   Core JS Files   -->
      <script src="{{asset('result-assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    	<script src="{{asset('result-assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

    	<!--  Checkbox, Radio & Switch Plugins -->
    	<script src="{{asset('js/bootstrap-checkbox-radio.js')}}"></script>

    	<!--  Charts Plugin -->
			<script src="{{asset('js/chartist.min.js')}}"></script>

         <!-- Notifications Plugin    -->
        <script src="{{asset('js/bootstrap-notify.js')}}"></script>

        <!--  Google Maps Plugin    -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

        <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    	<script src="{{asset('result-assets/js/paper-dashboard.js')}}"></script>

			<script src="{{asset('result-assets/js/demo.js')}}"></script>




@yield('notificationpopup');


</html>
