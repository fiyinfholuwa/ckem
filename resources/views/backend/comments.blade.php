@extends('backend.app')

@section('content')
    <div class="row" style="margin:10px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Comments</h4>
                    <div class="bg-white p-3   align-items-center">



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Comment</th>
                                    <th>Post Title</th>
                                    <th>Date Commented</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $i = 1; ?>
                             @foreach($comments as $comment)
                             <tr>

                             <td>{{$i++;}}</td>
                             <td>{{$comment->name}}</td>
                             <td>{{$comment->message}}</td>
                             <td>{{optional($comment->post)->title}}</td>
                             <td>{{$comment->created_at->diffForHumans();}}</td>

                             <td><a href="#" data-toggle="modal" data-target="#comment_{{$comment->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                    </td>
                                    @include('backend.modals.deleteComment')</td>
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
