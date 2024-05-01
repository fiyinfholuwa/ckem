@extends('frontend.app')



@section('content')
<section style="background-image: url('/frontend/assets/img/blog.avif');" class="banner relative">
        <div class="overlay2"></div>
        <h1>BLOG DETAILS</h1>
        <p class="text-white"><span class="text-graz font-bold">Home</span> / Blog Details</p>
    </section>

    <section class="content">
        <div class="px-[2rem] md:px-[4rem] flex flex-col lg:flex-row gap-10 w-full" >
            <div class="w-full lg:w-8/12">
                <div class="space-y-6">
                  <div class="flex flex-col gap-6">
                    <div class="">
                       <img src="{{asset($post->image)}}" class=" w-full" alt="">
                    </div>
                    <div class=" space-y-4">
                      <h1 class="font-bold "><span>{{$post->title}}</span></h1>
                      <h1 class="font-bold ">Author: <span>{{$post->author}}</span></h1>
                      <h1 class="font-bold ">Date Posted: <span>@php
                      $inputDate = new DateTime($post->created_at);
                      $datePart = $inputDate->format('Y-m-d');
                      $outputDateString = DateTime::createFromFormat('Y-m-d', $datePart)->format('j M. Y');
                  @endphp
                {{$outputDateString}}</span></h1>
                    </div>



                  </div>


                    <p>{!! $post->content !!}</p>

                    <div class="border-t border-b bg-ash p-6">
                        <!-- comments -->
                        <div class="w-full bg-ash pb-6">
                          <p class="font-bold text-scarlet"> Comments ({{count($comments)}})</p>
                        </div>

                        <div class="space-y-6">
                            @if(count($comments) > 0)

                            @foreach($comments as $comment)
                          <div class="comment">
                            <div class="flex items-center gap-4">
                              <img class="h-[40px] w-[40px] rounded-full" src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI=" alt="commentor">
                              <div>
                                <p class="text-sm font-[500]">{{$comment->name}}</p>
                                <small class="italic opacity-70">Commented on: @php
                      $inputDate = new DateTime($comment->created_at);
                      $datePart = $inputDate->format('Y-m-d');
                      $outputDateString = DateTime::createFromFormat('Y-m-d', $datePart)->format('j M. Y');
                  @endphp
                {{$outputDateString}} </small>
                              </div>

                            </div>
                            <div class="pl-[2rem]">
                              <p class="text-sm">{{$comment->message}}</p>

                              <div class="space-x-4">
                                <!-- <button><i class="fa-regular fa-thumbs-up"></i></button> -->
                                <!-- <button><i class="fa-regular fa-thumbs-down"></i></button> -->
                              </div>
                            </div>

                          </div>
                          @endforeach



                        </div>

                        @else
                        <div style="color:red; font-weight:bold;">No Comment</div>
                        @endif

                    </div>

                    <div class="bg-graz p-6">
                        <!-- add comments -->

                        @auth

                        <form action="{{route('comment.save')}}" method="post" class="flex flex-col w-full gap-4">
                            @csrf
                          <span>
                            <h6 class="font-bold text-scarlet text-2xl ">Write a Comment</h6>
                          </span>
                          <input class="p-3 rounded-md border outline-none shadow-lg text-blac placeholder:italic" name="name" type="hidden" value="{{Auth::user()->name}}" placeholder="Enter your name" />

                          <input type="hidden"  name="post_id" value="{{$post->id}}"/>
                          <textarea name="message" class="p-3 rounded-md border outline-none shadow-lg text-blac placeholder:italic" rows="8" Message placeholder="Write a comment..."></textarea>
                          <button type="submit" class="hero-btn red-btn">DROP COMMENT</button>
                        </form>
                        @else
                        <form action="{{route('comment.save')}}" method="post" class="flex flex-col w-full gap-4">
                            @csrf
                          <span>
                          <input type="hidden"  name="post_id" value="{{$post->id}}"/>
                            <h6 class="font-bold text-scarlet text-2xl ">Write a Comment</h6>
                          </span>
                          <input name="name" class="p-3 rounded-md border outline-none shadow-lg text-blac placeholder:italic" type="text" placeholder="Enter your name" required />

                          <textarea name="message" class="p-3 rounded-md border outline-none shadow-lg text-blac placeholder:italic" rows="8" Message placeholder="Write a comment..."></textarea>
                          <button type="submit" class="hero-btn red-btn">DROP COMMENT</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-3/12 lg:px-4 lg:border-l ">
              <div class="bg-graz p-6 space-y-3">
                <!-- add comments -->
                <h6 class="font-bold text-scarlet text-2xl ">Recent  Articles</h6>
                <div class="space-y-3">
                    @foreach($posts as $post)
                  <div class="flex gap-3 p-1 bg-white shadow-md">
                    <img src="{{asset($post->image)}}" class="w-[60px] h-[60px]" alt="">
                    <div>
                    <a href="{{route('blog.detail', $post->post_url)}}">
                    <h1 class="font-bold">{{$post->title}}</h1>
                    </a>
                      <small>Authored By: <span>{{$post->author}}</span></small>
                      <small>Posted on: <span>@php
                      $inputDate = new DateTime($comment->created_at);
                      $datePart = $inputDate->format('Y-m-d');
                      $outputDateString = DateTime::createFromFormat('Y-m-d', $datePart)->format('j M. Y');
                  @endphp
                {{$outputDateString}}</span></small>
                    </div>

                  </div>

                 @endforeach
                </div>
            </div>
            </div>
        </div>
    </section>

@include('frontend.salvation')
@endsection
