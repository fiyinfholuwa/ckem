

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-4">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Admin Manager</h5>
              <div class="card">

              <form method="post" action="{{route('admin.admin_manager.save')}}" class="row g-3">
                @csrf

                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Full Name</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Full Name" id="inputName5">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('name')
                    {{$message}}
                  @enderror
                  </p>
                </div>
                <div class="col-md-12">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail5" placeholder="Email">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('email')
                    {{$message}}
                  @enderror
                  </p>
                </div>
                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Phone Number</label>
                  <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="inputPassword5" placeholder="Phone Number">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('phone')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                <div class="col-md-12">
                  <label for="inputPassword5" class="form-label">Select Role</label>
                  <select class="form-control" name="user_role" >
                    <option value="">
                        Select Role
                    </option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                  </select>
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('user_role')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                <div class="">
                  <button type="submit" class="btn btn-primary">Add Admin Manager</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


            </div>
          </div>


          <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Admin Managers</h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>

                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>

                      <span class="badge bg-success"><i class="fa fa-check"></i>{{optional($user->role_name)->name}}</span>

                    </td>
                    <td>

                    <a href="{{route('admin_manager.edit', $user->id)}}">
                    <i  class="fa fa-edit text-primary"></i>
                    </a>
                    <a type="button" class="" data-toggle="modal" data-target="#user_delete_{{$user->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>
                    @include('backend.modals.manager')
                  </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->
@endsection
