@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Attendances</h4>
                                    <form method="post" action="{{route('attendance.event.report')}}">
										@csrf
                                <div class="row">
                                    <div class="col-lg-2  mt-1">
                                    <div class="" style="">

                                    <input name="date_from" class="form-control "  type="date"  placeholder="Start Date"    required/>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-2  mt-1">
                                    <div class="" style="">

                                    <input name="date_to" class="form-control "  type="date"  placeholder="End Date"   required/>
                                    
                                    </div>
                                </div>
                                
                                <div class="col-lg-2  mt-1">
                                    <div class="" style="">
                                    <select  required class="form-control" name="type">
                                      <option value="">select option</option>
                                      @foreach($all_events as $en)
                                      <option value="{{$en->id}}">{{$en->title}}</option>
                                      @endforeach
                                      
                                      
                                    </select>
                                    
                                    </div>
                                </div>
                                
                              
                                <div class="col-lg-4   mt-1" >
                                <button type="submit" class='btn btn-secondary btn-sm'>Export to CSV</button>
                                </div>
                                </div>
                            </div>
                        </form>

								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Group</th>
                                                    
													<th>Action</th>
												</tr>
											</thead>

                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($events as $event)

											<tr>
												<td>{{$i++}}</td>
                                                <td>{{$event->full_name}}</td>
                                                <td>{{$event->email}}</td>
                                                <td>{{$event->phone}}</td>
                                                <td>{{$event->group}}</td>
                                                
                                                <td>
                                            
                                                <a href="#" data-toggle="modal" data-target="#event_{{$event->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('backend.modals.deleteAttendanceEvent')
											</tr>

                                            @endforeach

                                            </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>


            </div>

@endsection
