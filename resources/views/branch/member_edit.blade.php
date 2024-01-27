@extends('branch.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Member</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('branch.member.update', $member->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Full Name</label>
                                <input type="text" class="form-control" id="email2" value="{{$member->name}}" required name="name" placeholder="Enter Full Name">
                                <small style="color:red; font-weight:500">
                                @error('name')
                                {{$message}}
                                @enderror
                                </small>

                            </div>

                            <div class="form-group">
                                <label for="email2">Phone Number</label>
                                <input type="number" class="form-control" value="{{$member->phone}}" id="email2" required name="phone" placeholder="Enter Position">
                                <small style="color:red; font-weight:500">
                                @error('phone')
                                {{$message}}
                                @enderror
                                </small>

                            </div>


                               <div class="form-group">
                                   <label for="email2">Email</label>
                                   <input type="email" class="form-control" id="email2" required value="{{$member->email}}" name="email" placeholder="Enter Position">
                                   <small style="color:red; font-weight:500">
                                       @error('email')
                                       {{$message}}
                                       @enderror
                                   </small>
                               </div>

                               <div class="form-group">
                                   <label for="email2">Worker Status</label>
                                   <select required name="worker_status" class="form-control">
                                       <option value="">Select Option</option>
                                       <option {{$member->worker_status == "yes" ? "selected": ""}} value="yes">Yes</option>
                                       <option {{$member->worker_status == "no" ? "selected": ""}} value="no">No</option>
                                   </select>
                                   <small style="color:red; font-weight:500">
                                       @error('work_status')
                                       {{$message}}
                                       @enderror
                                   </small>
                               </div>

                               <div class="form-group">
                                   <label for="email2">Ordained Status</label>
                                   <select required name="ordained_status" class="form-control">
                                       <option value="">Select Option</option>
                                       <option {{$member->ordained_status == "yes" ? "selected": ""}}  value="yes">Yes</option>
                                       <option {{$member->ordained_status == "no" ? "selected": ""}} value="no">No</option>
                                   </select>
                                   <small style="color:red; font-weight:500">
                                       @error('ordained_status')
                                       {{$message}}
                                       @enderror
                                   </small>
                               </div>

                               <div class="card-action">
                            <button class="btn btn-primary">Update Member</button>

                        </div>
                           </form>
                    </div>

                </div>

            </div>

@endsection
