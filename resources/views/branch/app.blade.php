
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>CKEM Admin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('frontend/assets/images/logo.png')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('../../assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ["{{asset('../../assets/css/fonts.css')}}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('../../assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('../../assets/css/azzara.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('../../assets/css/demo.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" >
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="#e2a822">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="../index.html" class="logo">
					<!-- <img src="../../assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand"> -->
					<img style="width:60px; height:40px; padding-top: 5px; border-radius: 40px;"  src="https://ckem.vercel.app/assets/img/ckem%20logo.png" />
					<!-- <span style="color:#fff;">PACIOLI</span> -->
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i style="color:#e2a822 !important;" class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i style="color:#e2a822 !important;"  class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i style="color:#e2a822 !important;" class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->
			@php
			$currentUrl = url()->current();
			@endphp
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">

					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">

										<div class="u-text">
											<h3>{{Auth::user()->name}}</h3>
										</div>
									</div>
								</li>

                                <li>
								<a class="dropdown-item text-danger" href="{{ route('logout') }}" >Logout</a>

								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						<img src="https://cdn-icons-png.flaticon.com/512/6386/6386976.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>

									<span class="user-level">{{Auth::user()->name}}</span>
									<span class="caret"></span>

								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav">
                        <li class="nav-item">
							<a href="{{route('branch.dashboard')}}">
								<i class="fas fa-home"></i>
								<p class="{{ request()->routeIs('branch.dashboard') ? 'text-warning' : '' }}">Dashboard</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>


						<li class="nav-item">
							<a data-toggle="collapse" href="#project">
								<i class="fa fa-user"></i>
								<p class="{{ request()->routeIs('branch.member.view') || request()->routeIs('branch.member.all') || request()->routeIs('branch.member.worker.all') || request()->routeIs('branch.member.ordained.all') ? 'text-warning' : '' }}">Manage Member</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="project">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('branch.member.view')}}">
											<span class="sub-item">Add Member</span>
										</a>
									</li>
									<li>
										<a href="{{route('branch.member.all')}}">
											<span class="sub-item">All Members</span>
										</a>
									</li>

                                    <li>
                                        <a href="{{route('branch.member.worker.all')}}">
                                            <span class="sub-item">All Workers</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('branch.member.ordained.all')}}">
                                            <span class="sub-item">All Ordained Ministers</span>
                                        </a>
                                    </li>
                                </ul>
							</div>
						</li>




                        <li class="nav-item">
							<a data-toggle="collapse" href="#testimonial">
								<i class="fas fa fa-quote-left"></i>
								<p class="{{ request()->routeIs('branch.testimonial.view') || request()->routeIs('branch.testimonial.all')  ? 'text-warning' : '' }}">Manage Testimonials</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="testimonial">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('branch.testimonial.view')}}">
											<span class="sub-item">Add Testimonial</span>
										</a>
									</li>
									<li>
										<a href="{{route('branch.testimonial.all')}}">
											<span class="sub-item">All Testimonials</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#request">
                                <i class="fa fa-paper-plane"></i>
                                <p class="{{ request()->routeIs('branch.request.view') || request()->routeIs('branch.request.all')  ? 'text-warning' : '' }}">Manage Request</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="request">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('branch.request.view')}}">
                                            <span class="sub-item">Add Request</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('branch.request.all')}}">
                                            <span class="sub-item">All Requests</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#attendance">
                                <i class="fa fa-paper-plane"></i>
                                <p class="{{ request()->routeIs('branch.attendance.view') || request()->routeIs('branch.attendance.all')  ? 'text-warning' : '' }}">Manage Attendance</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="attendance">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('branch.attendance.view')}}">
                                            <span class="sub-item">Add Attendance</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('branch.attendance.all')}}">
                                            <span class="sub-item">All Attendances</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item ">

                            <a href="{{ route('branch.password.view') }}">
                                <i class="fas fa-lock"></i>
                                <p class=" {{ request()->routeIs('branch.password.view') ? 'text-warning' : '' }}">Change Password</p>
                            </a>

                        </li>

                        <li class="nav-item">

						<a href="{{ route('logout') }}">
							<i class="fas fa-sign-out-alt"></i>
								<p class="text-danger">Logout</p>
								<!-- <span class="badge badge-count badge-success">4</span> -->
							</a>

						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel" style="margin-top: 10px">
			<div class="content">


                @yield('content')


			</div>

		</div>

		<!-- Custom template | don't include it in your project! -->

		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('../../assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('../../assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('../../assets/js/core/bootstrap.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{asset('../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
	<!-- Bootstrap Toggle -->
	<script src="{{asset('../../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
	<!-- jQuery Scrollbar -->
	<script src="{{asset('../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Datatables -->
	<script src="{{asset('../../assets/js/plugin/datatables/datatables.min.js')}}"></script>
	<!-- Azzara JS -->
	<script src="{{asset('../../assets/js/ready.min.js')}}"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="{{asset('../../assets/js/setting-demo.js')}}"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>


 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'success':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'warning':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'error':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #ff0000, #ff0000)" }
    }).showToast();
    break;
 }
 @endif

</script>


</body>
</html>
