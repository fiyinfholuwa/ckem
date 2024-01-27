@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Projects</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('project.update', $project->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Project Title</label>
                                <input type="text" value="{{$project->title}}" class="form-control" id="email2" required name="title" placeholder="Enter  Project Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                                <label for="email2">Project  Content</label>
                                <textarea type="text" rows="10" class="form-control" id="email2" required name="content" placeholder="Enter Project Location">{{$project->content}}</textarea>
                                <small style="color:red; font-weight:500">
                                @error('content')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                                <label for="email2">Project  Location</label>
                                <input type="text" value="{{$project->location}}" class="form-control" id="email2" required name="location" placeholder="Enter Project Location">
                                <small style="color:red; font-weight:500">
                                @error('location')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                                <label for="email2">Project Total Surface Area</label>
                                <input type="text" value="{{$project->area}}" class="form-control" id="email2" required name="area" placeholder="Enter Project Surface Area">
                                <small style="color:red; font-weight:500">
                                @error('area')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Project Year</label>
                                <input type="text" class="form-control" id="email2" value="{{$project->year}}" required name="year" placeholder="Enter Project Year">
                                <small style="color:red; font-weight:500">
                                @error('area')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>

                            <div class="form-group">
                                <label for="email2">Project Image</label>
                                <input type="file" class="form-control" id="email2" accept="image/*" name="image" >
                                <img height="60" width="60" src="{{asset($project->image)}}" />
                                <small style="color:red; font-weight:500">
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Project</button>
                
                        </div>
                           </form>
                    </div>
                    
                </div>
                
            </div>

@endsection