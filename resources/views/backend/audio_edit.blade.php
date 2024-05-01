@extends('backend.app')

@section('content')

            <div class="row" style="margin: 10px">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Audio Message</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('audio.update', $audio->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Audio Title</label>
                                <input type="text" class="form-control" id="email2" value="{{$audio->title}}"  name="title" placeholder="Enter  Audio Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                               <div class="form-group">
                                   <label for="email2">Audio Link</label>
                                   <input type="text" class="form-control" id="email2" value="{{$audio->file}}" placeholder="Enter Audio Link" name="link" >
                                   <small style="color:red; font-weight:500">
                                       @error('link')
                                       {{$message}}
                                       @enderror
                                   </small>

                               </div>

                               <div class="form-group">
                                   <label for="email2">Audio Preacher</label>
                                   <input type="text" class="form-control" id="email2"  value="{{$audio->preacher}}"  name="preacher" placeholder="Enter  Audio Preacher">
                                   <small style="color:red; font-weight:500">
                                       @error('preacher')
                                       {{$message}}
                                       @enderror
                                   </small>

                               </div>


                               <div class="form-group">
                                <label for="email2">Audio Image</label>
                                <input type="file" class="form-control" id="email2" accept="image/*"  name="image" >
                                <small style="color:red; font-weight:500">
                                    <img height="60" width="60" src="{{asset($audio->image)}}" />
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                        <div class="card-action">
                            <button class="btn btn-primary">Update Audio</button>

                        </div>
                       </form>
                    </div>

                </div>
                </div>
            </div>


@endsection
