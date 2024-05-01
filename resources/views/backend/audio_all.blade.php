@extends('backend.app')

@section('content')

            <div class="row" style="margin: 10px">


                <div class="col-lg-9">

                                    <h4 style="margin: 10px;" class="card-title">All Audios</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover" >
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Title</th>
                                                <th>Link</th>
                                                <th>Preacher</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                <?php $i = 1; ?>
                                            @foreach($audios as $audio)

                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$audio->title}}</td>
                                                    <td><a target="_blank" class="badge bg-primary text-white" href="{{$audio->file}}">View Link</a></td>
                                                    <td>{{$audio->preacher}}</td>
                                                    <td><img height="40" width="40" src="{{asset($audio->image)}}" /></td>
                                                    <td>
                                                        <a href="{{route('audio.edit', $audio->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#audio_{{$audio->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                    </td>
                                                    @include('backend.modals.deleteAudio')
                                                </tr>

                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


@endsection
