@extends('frontend.app')



@section('content')

<section
      style="background-image: url({{asset('frontend/assets/img/serm.jpg')}})"
      class="banner relative"
    >
      <div class="overlay2"></div>
      <h1>SERMON</h1>
      <p class="text-white">
        <span class="text-graz font-bold">Home</span> / Sermon
      </p>
    </section>


<section class="content">
      <div class="px-[2rem] md:px-[4rem]">
        <div>
          <h3 class="header-title">Our Sermons</h3>
          <div class="marker">
            <div class="line"></div>
            <div class="circle"></div>
            <div class="line"></div>
          </div>
        </div>

          @if(count($audios) > 0)
              <div
                  class="w-full grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3"
              >

                  @foreach($audios as $audio)
                      <div class="sermon-card shadow-md bg-ash">
                          <div class="sermon-img">

                              <div class="sermon-overlay border gap-4">

                                  <a target="_blank" href="{{asset($audio->file)}}" style="padding: 10px 20px; font-weight: bolder; color: #f4f5f8; font-size: 20px;" class="border">
                                      <i class="fa-solid fa-download"></i> Download
                                  </a>
                              </div>
                              <img
                                  class="w-full h-full"
                                  src="{{asset($audio->image)}}"
                                  alt=""
                              />
                          </div>
                          <div class="p-3">
                              <h3 class="font-[600] text-blac text-lg">{{$audio->title}}</h3>
                              <p class="italic text-scarlet">by: {{$audio->preacher}}</p>
                          </div>
                      </div>

                  @endforeach
              </div>

                      {{$audios->links('frontend.paginate')}}
          @else
              <h4 style="color: red; font-weight: bolder">No Audio yet</h4>
          @endif
     </div>
    </section>

@include('frontend.salvation')
@endsection
