@extends('branch.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Request</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('branch.request.update', $request->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Subject</label>
                                <input type="text" class="form-control" id="email2" value="{{$request->subject}}"  name="subject" placeholder="Enter Request Subject">
                                <small style="color:red; font-weight:500">
                                @error('subject')
                                {{$message}}
                                @enderror
                                </small>

                            </div>
                            <div class="form-group">
                                <label for="email2">Body</label>
                                <textarea type="text" class="form-control" id="email2" rows="10" name="body" placeholder="Enter Request Body">{{$request->body}}</textarea>
                                <small style="color:red; font-weight:500">
                                @error('body')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                        <div class="card-action">
                            <button class="btn btn-primary">Update Request</button>

                        </div>
                           </form>
                    </div>

                </div>

            </div>

@endsection
