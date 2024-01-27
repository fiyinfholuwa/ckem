@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Pastor</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('pastor.update', $pastor->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Full Name</label>
                                <input type="text" class="form-control" id="email2"  value="{{$pastor->name}}" required name="name" placeholder="Enter Full Name">
                                <small style="color:red; font-weight:500">
                                @error('name')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                            <div class="form-group">
                                <label for="email2">Position</label>
                                <input type="text" class="form-control" value="{{$pastor->position}}" id="email2" required name="position" placeholder="Enter Position">
                                <small style="color:red; font-weight:500">
                                @error('position')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                            <div class="form-group">
                                <label for="email2">Image</label>
                                <input type="file" class="form-control" id="email2" accept="image/*"  name="image" >
                                <small style="color:red; font-weight:500">
                                    <img height="60" width="60" src="{{asset($pastor->image)}}" />
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Pastor</button>

                        </div>
                           </form>
                    </div>

                </div>

            </div>

@endsection
