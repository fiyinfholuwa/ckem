@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Events</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Title</th>
                                                    <th>Content</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Image</th>
													<th>Action</th>
												</tr>
											</thead>

                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($events as $event)

											<tr>
												<td>{{$i++}}</td>
                                                <td>{{$event->title}}</td>
                                                <td>{!!Str::limit(html_entity_decode($event->body),20,"...")!!}</td>
                                                <td>{{$event->start_date}}</td>
                                                <td>{{$event->end_date}}</td>
                                                <td><img height="40" width="40" src="{{asset($event->image)}}" /></td>
                                                <td>
                                                <a href="{{route('event.edit', $event->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#event_{{$event->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('backend.modals.deleteEvent')
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
