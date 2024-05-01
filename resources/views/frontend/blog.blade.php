@extends('frontend.app')



@section('content')

<section
      style="background-image: url({{asset('frontend/assets/img/blog.avif')}})"
      class="banner relative"
    >
      <div class="overlay2"></div>
      <h1 class="text-center"> ARTICLES</h1>
      <p class="text-white">
        <span class="text-graz font-bold">Home</span> / Blog
      </p>
    </section>

    <section class="content">
      <div class="px-[2rem] md:px-[4rem]">
        <div>
          <h3 class="header-title">Recent  Articles</h3>
          <div class="marker">
            <div class="line"></div>
            <div class="circle"></div>
            <div class="line"></div>
          </div>
        </div>


        @if(count($posts) > 0)

       

        <div
          class="w-full grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3"
        >
        @foreach($posts as $post)
          <div class="blog-card shadow-lg bg-[#f7f8f9] mt-5">
            <div class="blog-img relative">
              <a
                class="absolute bottom-0 right-0"
                href="{{route('blog.detail', $post->post_url)}}"
                ><button
                  class="py-3 px-6 bg-blac border border-white opacity-80 hover:opacity-100 ease-in-out transition-all duration-500"
                >
                  Read More
                </button></a
              >
              <img class="w-full h-full" src="{{asset($post->image)}}" alt="" />
            </div>
            <div class="p-3 space-y-4">
              <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                  <img src="{{asset('frontend/assets/img/sermon1.jpg')}}" class="rounded-full w-[30px] h-[30px]" alt="" />
                  <span class="text-scarlet">{{$post->author}}</span>
                </div>
                <div>
                  <!-- date -->
                  <i></i>
                  <p>@php
                      $inputDate = new DateTime($post->created_at);
                      $datePart = $inputDate->format('Y-m-d');
                      $outputDateString = DateTime::createFromFormat('Y-m-d', $datePart)->format('j M. Y');
                  @endphp
                {{$outputDateString}}
                </p>
                </div>
              </div>

              <div>
                <h1 class="font-[700]">
                  {{$post->title}}
                </h1>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        
        {{$posts->links('frontend.paginate')}}
      </div>
      @else
        <div style="color:red; font-weight:bold">No Posts</div>
      @endif
    </section>

@include('frontend.salvation')
@endsection