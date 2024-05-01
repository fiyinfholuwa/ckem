@extends('frontend.app')



@section('content')
<section
      style="background-image: url({{asset('frontend/assets/img/blog.avif')}})"
      class="banner relative"
    >
      <div class="overlay2"></div>
      <h1>OUR EVENTS</h1>
      <p class="text-white">
        <span class="text-graz font-bold">Home</span> / Events
      </p>
    </section>

    <section class="content">
      <div class="px-[2rem] md:px-[4rem]">
        <div>
          <h3 class="header-title">Weekly Services</h3>
          <div class="marker">
            <div class="line"></div>
            <div class="circle"></div>
            <div class="line"></div>
          </div>
        </div>

        <div class="w-full grid grid-cols-1 gap-10 lg:grid-cols-3">
          <div class="event-card shadow-md bg-ash rounded-2xl">
            <div class="event-img">
              <div class="event-overlay border gap-4">
                <h1 class="font-bold text-[36px] text-white">Every Sunday</h1>
                <p class="font-bold text-[24px] text-white text-center">Sunday Service</p>
                <p
                  class="font-bold text-[16px] text-scarlet bg-[white] px-4 py-2 rounding-lg"
                >
                  8am - 11:30am
                </p>
              </div>
              <img
                class="w-full h-full"
                src="{{asset('frontend/assets/img/sermon1.jpg')}}"
                alt=""
              />
            </div>
          </div>
          <div class="event-card shadow-md bg-ash rounded-2xl">
            <div class="event-img">
              <div class="event-overlay border gap-4">
                <h1 class="font-bold text-[36px] text-white">Every Tuesdays</h1>
                <p class="font-bold text-[24px] text-white text-center">
                  Healing/Deliverance Service
                </p>
                <p
                  class="font-bold text-[16px] text-scarlet bg-[white] px-4 py-2 rounding-lg"
                >
                  5:30pm - 7:30pm
                </p>
              </div>
              <img
                class="w-full h-full"
                src="{{asset('frontend/assets//img/sermon1.jpg')}}"
                alt=""
              />
            </div>
          </div>
          <div class="event-card shadow-md bg-ash rounded-2xl">
            <div class="event-img">
              <div class="event-overlay border gap-4">
                <h1 class="font-bold text-[36px] text-white">Every Thursday</h1>
                <p class="font-bold text-[24px] text-white text-center">Bible Study</p>
                <p
                  class="font-bold text-[16px] text-scarlet bg-[white] px-4 py-2 rounding-lg"
                >
                  5:30pm - 7:30pm
                </p>
              </div>
              <img
                class="w-full h-full"
                src="{{asset('frontend/assets//img/sermon1.jpg')}}"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    @if(count($events) > 0)
    <section class="content">
      <div class="px-[2rem] md:px-[4rem]">
        <div>
          <h3 class="header-title">Special Events</h3>
          <div class="marker">
            <div class="line"></div>
            <div class="circle"></div>
            <div class="line"></div>
          </div>
        </div>

        @foreach($events as $event)

        <div class="w-full grid grid-cols-1 gap-10 lg:grid-cols-3">
          
          <div class="special-event-card shadow-md bg-ash rounded-2xl">
            <div class="special-event-img">
              <div class="special-event-overlay border gap-4">
                <h1 class="font-bold text-[36px] text-white">{{$event->title}}</h1>
                <p class="font-bold text-[16px] text-white">
                  Date: {{$event->start_date}}
                </p>
                <p class="font-bold text-[16px] text-white">
                  Venue: Church Auditorium
                </p>
                <a href="{{route('event.detail', $event->title_slug)}}"
                  ><button
                    class="font-bold text-[16px] text-scarlet bg-[white] px-6 hover:bg-scarlet hover:text-white transition-all ease-in-out duration-500 py-2 rounded-lg"
                  >
                    View Events
                  </button></a
                >
              </div>
              <img
                class="w-full h-full"
                src="{{asset($event->image)}}"
                alt=""
              />
            </div>
          </div>


        </div>
     @endforeach

      </div>
    </section>
    @endif

@include('frontend.salvation')
@endsection