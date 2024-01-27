@extends('backend.app')

@section('content')

    <div class="row" style="margin:10px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Request</div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.request.update', $request->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email2">Subject</label>
                            <input type="text" class="form-control" readonly id="email2" value="{{$request->subject}}"  name="subject" placeholder="Enter Request Subject">
                            <small style="color:red; font-weight:500">
                                @error('subject')
                                {{$message}}
                                @enderror
                            </small>

                        </div>
                        <div class="form-group">
                            <label for="email2">Body</label>
                            <textarea type="text" class="form-control" readonly id="email2" rows="10" name="body" placeholder="Enter Request Body">{{$request->body}}</textarea>
                            <small style="color:red; font-weight:500">
                                @error('body')
                                {{$message}}
                                @enderror
                            </small>

                        </div>

                        <div class="form-group">
                            <label for="email2">Request Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="completed" {{$request->status == "completed" ? "selected" : ""}}>Completed</option>
                                <option value="processing" {{$request->status == "processing" ? "selected" : ""}}>Processing</option>
                                <option value="pending" {{$request->status == "pending" ? "selected" : ""}}>Pending</option>
                            </select>
                        </div>


                        <div class="card-action">
                            <button class="btn btn-primary">Update Request</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>

@endsection
