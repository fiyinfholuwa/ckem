@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Projects</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Title</th>
                                                    <th>Location</th>
													<th>Content</th>
                                                    <th>Surface Area</th>
                                                    <th>Year</th>
                                                    <th>Image</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($projects as $project)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$project->title}}</td>
                                                <td>{{$project->location}}</td>
												<td>{!!Str::limit(html_entity_decode($project->content),20,"...")!!}</td>
                                                <td>{{$project->area}}</td>
                                                <td>{{$project->year}}</td>
                                                <td><img height="40" width="40" src="{{asset($project->image)}}" /></td>
                                                <td>
                                                <a href="{{route('project.edit', $project->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#project_{{$project->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('backend.modals.deleteProject')
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