@extends('backend.app')

@section('content')

    <div class="row" style="margin:10px">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Requests</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($requests as $request)

                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$request->subject}}</td>
                                    <td>{!!Str::limit(html_entity_decode($request->body),20,"...")!!}</td>
                                    <td>
                                        @if($request->status == "pending")
                                            <span class="badge bg-warning">{{$request->status}}</span>
                                        @else
                                            <span class="badge bg-success">{{$request->status}}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('admin.request.edit', $request->id)}}" ><i style="color:blue;" class="fa fa-edit"></i>Manage</a>
                                    </td>
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
