@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Manage Media Links</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('media.add')}}" method="post" enctype="multipart/form-data">
                               @csrf
                           @if(!is_null($media))
                                   <div class="form-group">
                                       <label for="email2">Youtube Live Link</label>
                                       <input type="text" class="form-control" id="email2" value="{{$media->youtube}}"  name="youtube" placeholder="Enter  Youtube Link">
                                       <small style="color:red; font-weight:500">
                                           @error('youtube')
                                           {{$message}}
                                           @enderror
                                       </small>

                                   </div>


                                   <div class="form-group">
                                       <label for="email2">Facebook Live Link</label>
                                       <input type="text" class="form-control" id="email2" value="{{$media->facebook}}"  name="facebook" placeholder="Enter  Facebook Link">
                                       <small style="color:red; font-weight:500">
                                           @error('facebook')
                                           {{$message}}
                                           @enderror
                                       </small>

                                   </div>

                                    <input type="hidden" value="{{$media->id}}" name="media_id">
                                   <div class="form-group">
                                       <label for="email2">Mixrl Live Link</label>
                                       <input type="text" class="form-control" id="email2" value="{{$media->mixrl}}"  name="mixrl" placeholder="Enter Mixrl Link">
                                       <small style="color:red; font-weight:500">
                                           @error('facebook')
                                           {{$message}}
                                           @enderror
                                       </small>

                                   </div>


                               @else
                                   <div class="form-group">
                                       <label for="email2">Youtube Live Link</label>
                                       <input type="text" class="form-control" id="email2" value="{{old('youtube')}}"  name="youtube" placeholder="Enter  Youtube Link">
                                       <small style="color:red; font-weight:500">
                                           @error('youtube')
                                           {{$message}}
                                           @enderror
                                       </small>

                                   </div>


                                   <div class="form-group">
                                       <label for="email2">Facebook Live Link</label>
                                       <input type="text" class="form-control" id="email2" value="{{old('facebook')}}"  name="facebook" placeholder="Enter  Facebook Link">
                                       <small style="color:red; font-weight:500">
                                           @error('facebook')
                                           {{$message}}
                                           @enderror
                                       </small>

                                   </div>


                                   <div class="form-group">
                                       <label for="email2">Mixrl Live Link</label>
                                       <input type="text" class="form-control" id="email2" value="{{old('mixrl')}}"  name="mixrl" placeholder="Enter Mixrl Link">
                                       <small style="color:red; font-weight:500">
                                           @error('facebook')
                                           {{$message}}
                                           @enderror
                                       </small>

                                   </div>


                               @endif
                               <div class="card-action">
                            <button class="btn btn-primary">Save Media Links</button>

                        </div>
                       </form>
                    </div>

                </div>


                <div class="col-lg-7">

                </div>
            </div>

@endsection
