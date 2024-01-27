

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        @if($role->permission == NULL)
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Set Permission for  <span class="text-danger">{{$role->name}}</span></h5>
              <div class="card">

              <form action="{{route('role.permission.set', $role->id)}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12 col-lg-12">
                <div class="mt-1">
                <label for="checkbox">Manage Post Category:</label>
                <input type="checkbox" name="permission[]" id="checkbox" value="manage_post_category">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Posts:</label>
                <input type="checkbox" value="manage_posts" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Members:</label>
                <input type="checkbox" value="manage_members" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Pastors:</label>
                <input type="checkbox" value="manage_pastors" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Media:</label>
                <input type="checkbox" value="manage_media" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Admins:</label>
                <input type="checkbox" value="manage_admins" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Church Branches:</label>
                <input type="checkbox" value="manage_church_branches" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Events:</label>
                <input type="checkbox" value="manage_events" id="checkbox" name="permission[]">
                </div>
                <div class="mt-1">
                <label for="checkbox">Manage Testimonials:</label>
                <input type="checkbox" value="manage_testimonials" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Messages:</label>
                <input type="checkbox" value="manage_messages" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Comments:</label>
                <input type="checkbox" value="manage_comments" id="checkbox" name="permission[]">
                </div>

                <div class="mt-1">
                <label for="checkbox">Manage Requests:</label>
                <input type="checkbox" value="manage_requests" id="checkbox" name="permission[]">
                </div>


                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Set Permission</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


            </div>
          </div>
      </div>
      @else
      <div class="col-lg-8">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Set Permission for <span class="text-danger">{{$role->name}}</span></h5>
            <div class="card">

              <form action="{{route('role.permission.set', $role->id)}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12 col-lg-12">
                  @php
                    $permissionsFromDB = json_decode($role->permission);

                  $allPermissions = ['manage_post_category', 'manage_posts', 'manage_members', 'manage_pastors', 'manage_media', 'manage_admins', 'manage_church_branches', 'manage_events', 'manage_testimonials', 'manage_messages','manage_comments','manage_requests'];
                  @endphp
                  @foreach($allPermissions as $permission)
                  <div class="mt-1">
                  @php

                    $label = str_replace('_', ' ', $permission);
                    @endphp
                    <label for="{{$permission}}">{{$label}}</label>

                    <input type="checkbox" value="{{$permission}}" id="{{$permission}}" name="permission[]" {{ in_array($permission, $permissionsFromDB) ? 'checked' : '' }}>
                  </div>
                  @endforeach

                </div>

                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Set Permission</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


        </div>
      </div>

      @endif
  </section>



  </main><!-- End #main -->
@endsection
