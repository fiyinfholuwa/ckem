@extends('backend.app')

@section('content')
                <div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="fas fa-users"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">No of Customers</p>
												<h4 class="card-title">3</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="far fa-newspaper"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">No Of Deductions</p>
												<h4 class="card-title">0</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="far fa-chart-bar"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Due Loans</p>
												<h4 class="card-title">&#8358;0</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="fa fa-tag"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">No Of Groups</p>
												<h4 class="card-title">3</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				
				
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Feed Activity</div>
								</div>
								<div class="card-body">
									<ol class="activity-feed">
										
										<li class="feed-item feed-item-secondary">
											<time class="date" datetime="9-25">12-12-34</time>
											<span class="text">34</a></span>
										</li>
										
									</ol>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Recent Loans</div>
										<div class="card-tools">
											<!-- <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
												</li>
											</ul> -->
										</div>
									</div>
								</div>
								<div class="card-body">
									
									<div class="d-flex">
										<div class="avatar avatar-online">
											<span class="avatar-title rounded-circle border border-white bg-info">111</span>
										</div>
										<div class="flex-1 ml-3 pt-1">
											<h5 class="text-uppercase fw-bold mb-1">1111<span class="text-warning pl-3">pending</span></h5>
											<!-- <span class="text-muted">I am facing some trouble with my viewport. When i start my</span> -->
										</div>
										<div class="float-right pt-1">
											<small class="text-muted">hello</small>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection