@extends('backend.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Event</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('event.update', $event->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Event Title</label>
                                <input type="text" class="form-control" id="email2" value="{{$event->title}}" name="title" placeholder="Enter  Event Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                            <div class="form-group">
                                <label for="email2">Event Content</label>
                                <textarea rows="10" type="text" class="form-control"  id="email2" required name="body" placeholder="Enter Event Content">{{$event->body}}</textarea>
                                <small style="color:red; font-weight:500">
                                @error('body')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                               <div class="form-group">
                                   <label for="email2">Start Date</label>
                                   <input  type="date" class="form-control" value="{{$event->start_date}}" id="email2" required name="start_date" />
                                   <small style="color:red; font-weight:500">
                                       @error('start_date')
                                       {{$message}}
                                       @enderror
                                   </small>

                               </div>

                               <div class="form-group">
                                   <label for="email2">End Date</label>
                                   <input  type="date" class="form-control" value="{{$event->end_date}}" id="email2" required name="end_date" />
                                   <small style="color:red; font-weight:500">
                                       @error('end_date')
                                       {{$message}}
                                       @enderror
                                   </small>

                               </div>


                               <div class="form-group">
                                <label for="email2">Event Image</label>
                                <input type="file" class="form-control" id="email2" accept="image/*"  name="image" >
                                <small style="color:red; font-weight:500">
                                <img height="60" width="60" src="{{asset($event->image)}}" />
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Event</button>

                        </div>
                           </form>
                    </div>

                </div>

            </div>

@endsection
