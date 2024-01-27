@extends('backend.app')

@section('content')
    <div class="row" style="margin:10px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Branches</h4>
                    <div class="bg-white p-3   align-items-center">



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $i = 1; ?>
                             @foreach($branches as $branch)
                             <tr>

                             <td>{{$i++;}}</td>
                             <td>{{$branch->name}}</td>
                             <td>{{$branch->email}}</td>
                             <td>{{$branch->phone}}</td>
                             <td>{{$branch->address}}</td>
                             <td><a href="{{route('branch.edit', $branch->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>

                                 <a href="#" data-toggle="modal" data-target="#branch_{{$branch->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                    </td>
                                    @include('backend.modals.deleteBranch')</td>
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
