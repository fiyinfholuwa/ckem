
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
											<h3>{{Auth::user()->email}}</h3>
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

									<span class="user-level">Super Admin</span>
									<span class="caret"></span>

								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav">

						<li class="nav-item">
							<a href="{{route('dashboard')}}">
								<i class="fas fa-home"></i>
								<p class="{{ request()->routeIs('dashboard')  ? 'text-warning' : '' }}">Dashboard</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>
                        @if(in_array('manage_post_category', $permissions) || Auth::user()->user_type== 3)
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-tag"></i>
								<p class="{{ request()->routeIs('category.view')   ? 'text-warning' : '' }}">Manage Post Category</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('category.view')}}">
											<span class="sub-item">Manage Post Category</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                        @endif

                        @if(in_array('manage_posts', $permissions) || Auth::user()->user_type== 3)
						<li class="nav-item">
							<a data-toggle="collapse" href="#post">
								<i class="fas fa-sticky-note"></i>
								<p class="{{ request()->routeIs('post.view') || request()->routeIs('post.all')  ? 'text-warning' : '' }}">Manage Posts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="post">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('post.view')}}">
											<span class="sub-item">Add Post</span>
										</a>
									</li>
									<li>
										<a href="{{route('post.all')}}">
											<span class="sub-item">All Post</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
                        @endif
                        @if(in_array('manage_members', $permissions) || Auth::user()->user_type== 3)
						<li class="nav-item">
							<a data-toggle="collapse" href="#project">
								<i class="fa fa-user"></i>
								<p class="{{ request()->routeIs('member.view') || request()->routeIs('member.all') || request()->routeIs('member.worker.all') || request()->routeIs('member.ordained.all')  ? 'text-warning' : '' }}">Manage Member</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="project">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('member.view')}}">
											<span class="sub-item">Add Member</span>
										</a>
									</li>
									<li>
										<a href="{{route('member.all')}}">
											<span class="sub-item">All Members</span>
										</a>
									</li>

                                    <li>
                                        <a href="{{route('member.worker.all')}}">
                                            <span class="sub-item">All Workers</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('member.ordained.all')}}">
                                            <span class="sub-item">All Ordained Ministers</span>
                                        </a>
                                    </li>
                                </ul>
							</div>
						</li>
                        @endif

                        @if(in_array('manage_pastors', $permissions) || Auth::user()->user_type== 3)
						<li class="nav-item">
							<a data-toggle="collapse" href="#product">
								<i class="fas fa-users"></i>
								<p class="{{ request()->routeIs('pastor.view') || request()->routeIs('pastor.all')  ? 'text-warning' : '' }}">Manage Pastors</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="product">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('pastor.view')}}">
											<span class="sub-item">Add Pastors</span>
										</a>
									</li>
									<li>
										<a href="{{route('pastor.all')}}">
											<span class="sub-item">All Pastors</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
                        @endif

                        @if(in_array('manage_media', $permissions) || Auth::user()->user_type== 3)
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#media">
                                <i class="fa fa-microphone"></i>
                                <p class="{{ request()->routeIs('audio.view') || request()->routeIs('media.view')  ? 'text-warning' : '' }}">Manage Media</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="media">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('audio.view')}}">
                                            <span class="sub-item">Manage Audio</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('media.view')}}">
                                            <span class="sub-item">Manage Live Media</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        @endif

                        @if(in_array('manage_admins', $permissions) || Auth::user()->user_type== 3)
                    <li class="nav-item">
                            <a data-toggle="collapse" href="#admin_manager">
                                <i class="fa fa-user-plus"></i>
                                <p class="{{ request()->routeIs('role.view') || request()->routeIs('admin_manager.view')  ? 'text-warning' : '' }}">Manage Admins</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="admin_manager">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('role.view')}}">
                                            <span class="sub-item">Manage Role</span>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="{{route('admin_manager.view')}}">
                                            <span class="sub-item">Manage Admins</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(in_array('manage_church_branches', $permissions) || Auth::user()->user_type== 3)
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#branch">
                                <i class="fas fa-church"></i>
                                <p class="{{ request()->routeIs('branch.view') || request()->routeIs('branch.all')  ? 'text-warning' : '' }}">Manage Church Branches</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="branch">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('branch.view')}}">
                                            <span class="sub-item">Add Church Branch</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('branch.all')}}">
                                            <span class="sub-item">All Church Branches</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(in_array('manage_events', $permissions) || Auth::user()->user_type== 3)
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#event">
                                <i class="fa fa-calendar"></i>
                                <p class="{{ request()->routeIs('event.view') || request()->routeIs('event.all')  ? 'text-warning' : '' }}">Manage Special Events</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="event">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('event.view')}}">
                                            <span class="sub-item">Add Event</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('event.all')}}">
                                            <span class="sub-item">All Events</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="">
                                            <span class="sub-item">All Attendees</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(in_array('manage_testimonials', $permissions) || Auth::user()->user_type== 3)
                        <li class="nav-item">
							<a data-toggle="collapse" href="#testimonial">
								<i class="fas fa fa-quote-left"></i>
								<p class="{{ request()->routeIs('testimonial.view') || request()->routeIs('testimonial.all')  ? 'text-warning' : '' }}">Manage Testimonials</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="testimonial">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('testimonial.view')}}">
											<span class="sub-item">Add Testimonial</span>
										</a>
									</li>
									<li>
										<a href="{{route('testimonial.all')}}">
											<span class="sub-item">All Testimonials</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
                        @endif

                        @if(in_array('manage_messages', $permissions) || Auth::user()->user_type== 3)
                        <li class="nav-item">
                            <a href="{{route('contact.all')}}">
                                <i class="fa fa-envelope"></i>
                                <p class=" {{ request()->routeIs('contact.all') ? 'text-warning' : '' }}">Messages</p>

                            </a>
                        </li>
                        @endif

                        @if(in_array('manage_comments', $permissions) || Auth::user()->user_type== 3)
						<li class="nav-item">
							<a href="{{route('comment.all')}}">
							<i class="fa fa-comments"></i>
								<p class=" {{ request()->routeIs('comment.all') ? 'text-warning' : '' }}">Comments</p>

							</a>
						</li>
                        @endif

                        @if(in_array('manage_requests', $permissions) || Auth::user()->user_type== 3)
                            <li class="nav-item">
                                <a href="{{route('admin.request.all')}}">
                                    <i class="fa fa-paper-plane"></i>
                                    <p class=" {{ request()->routeIs('admin.request.all') ? 'text-warning' : '' }}">Manage Request</p>

                                </a>
                            </li>
                        @endif

                        <li class="nav-item">

                            <a href="{{ route('admin.password.view') }}">
                                <i class="fas fa-lock"></i>
                                <p class=" {{ request()->routeIs('admin.password.view') ? 'text-warning' : '' }}">Change Password</p>
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
