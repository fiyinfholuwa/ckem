@extends('frontend.app')



@section('content')
<section class="hero flex justify-center items-center flex-col">
      <div class="overlay"></div>
      <div class="social-icon">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a target="_blank" href="https://www.facebook.com/ckeminternational"><i class="fa-brands fa-facebook-f"></i></a>
        <a href=""><i class="fa-brands fa-x-twitter"></i></a>
      </div>
      <div class="container">
        <div class="hero-content space-y-0">
          <p class="flex space-x-4 items-center">
            <img
              src="{{asset('frontend/assets/img/subtitle-img-white.png')}}"
              width="32"
              height="5"
              alt="Wavy line"
            />

            <span class="text-[#fff] text-lg">Welcome to</span>

            <img
              src="{{asset('frontend/assets/img/subtitle-img-white.png')}}"
              width="32"
              height="5"
              alt="Wavy line"
            />
          </p>

          <h2
            class="font-[800] text-white text-center text-[32px] sm:text-[44px] lg:text-[64px]"
          >
            Christ Kingdom Expansion Mission International
          </h2>

          <div class="hero-content-container">
            <div class="box flex justify-center w-full">
              <p class="hero-text md:w-[100%] text-center text-graz mb-8">
                ...raising an Army for the Expansion of God's Kingdom. Hebrews
                11:33-34
              </p>

              <a href="{{route('about')}}" class="pryBtn2 bg-blac shadow-md px-[16px]">
                Relate With Us
</a>
            </div>
            <div class="box">
              <p class="hero-text md:w-[100%] text-center text-graz mb-8">
                ...raising an Army for the Expansion of God's Kingdom. Hebrews
                11:33-34
              </p>

              <a href="{{route('contact')}}" class="pryBtn2 bg-scarlet shadow-md px-[16px]">
                Connect With Us
</a>
            </div>
            <div class="box">
              <p class="hero-text md:w-[100%] text-center text-graz mb-8">
                ...raising an Army for the Expansion of God's Kingdom. Hebrews
                11:33-34
              </p>

              <a href="{{route('events')}}" class="pryBtn2 shadow-md px-[16px]">Join With Us</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="w-full">

      <img src="{{asset('frontend/assets/img/ckemBanner.jpeg')}}" class="w-full" alt="">
    </section>

<section style="" class="lead-pastor bg-ash py-12">
      <div class="container flex flex-col lg:flex-row gap-4">
        <div class="flex-1 flex justify-center items-center">
          <img
            class="h-[400px] lg:h-[500px]"
            src="{{asset('frontend/assets/img/Mummy G.O 3.png')}}"
            alt=""
          />
        </div>
        <div style= " padding: 50px; box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;" class="flex-1">
          <p class="font-[300] text-xl">Meet Our General Overseer</p>
          <h3 class="font-[600] text-2xl">Pastor (Dr) Dorcas Adetula</h3>

          <div class="pastor-socials flex space-x-2 my-4">
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
          </div>
          <hr />
          <p class="font-[300] mt-3">
            Pastor (Dr) Dorcas Adetula, a remarkable woman of faith and
            strength, serving as the esteemed General Overseer of CHRIST KINGDOM
            EXPANSION MISSION INT'L. With a compelling vision and an unwavering
            commitment to spiritual leadership, Pastor (Dr) Dorcas Adetula has
            emerged as a guiding force within our faith community. <br />
            <br />
            Her journey is marked by a deep-rooted sense of dedication to the
            principles of love, compassion, and inclusivity. As the leader of
            our congregation, she has tiredlessly worked to create an
            environment where every member feels valued and supported in their
            spiritual journey. Her leadership style is characterized by a
            perfect blend of humility and authority, fostering a sense of unity
            and purpose among the church family. <br />
            Under her guidance, our church has blossomed into a vibrant hub of
            spiritual growth and community engagement. Her passion for outreach
            programs and social initiatives has extended the church's impact
            beyond its walls, positively influencing the lives of many. Whether
            its organizing charitable events, or offering words of wisdom during
            her sermons, she consistently demonstrates a commitment to making a
            meaningful difference. <br />
            <br />
            A true trailblazer, Pastor (Dr) Dorcas Adetula challenges
            stereotypes and breaks barriers, proving that effective leadership
            knows no gender. Her life and ministry serves as an inspiration for
            women aspiring to lead with grace and authority in ministry. Through
            her sermons, teachings and pesonal example, Pastor (Dr) Dorcas
            Adetula empowers individuals to embrace their faith in Jesus
            wholeheartedly, fostering a deeper connection with God.
          </p>
        </div>
      </div>
    </section>


@if(count($audios) > 0)
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

            <div
                class="w-full grid grid-cols-1 gap-16 md:grid-cols-2 lg:grid-cols-3"
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

            <div class="w-full flex justify-center items-center mt-12">
                <a href="{{route('sermons')}}">
            <button class="pryBtn w-[150px] shadow transition hidden lg:block">
              See More
            </button>
          </a>
            </div>
        </div>
    </section>

@endif

@if(count($pastors) > 0)

    <section class="content">
        <div class="px-[2rem] md:px-[4rem]">
            <div>
                <h3 class="header-title">Our Pastors</h3>
                <div class="marker">
                    <div class="line"></div>
                    <div class="circle"></div>
                    <div class="line"></div>
                </div>
            </div>

            <div
                class="w-full grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4"
            >

                @foreach($pastors as $pastor)
                    <div class="pastor-card shadow-md">
                        <div class="h-[80%] mb-3 relative">
                            <img
                                class="w-full h-full object-contain"
                                src="{{asset($pastor->image)}}"
                                alt=""
                            />

                            <div
                                style="background-color: rgba(0, 0, 0, 0.3)"
                                class="pastor-social-icon absolute bottom-0 right-0 p-1"
                            >
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                                <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                                <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                            </div>
                        </div>
                        <div class="px-4">
                            <h3 class="font-[600]">{{$pastor->name}}</h3>
                            <small class="text-yellow">{{$pastor->position}}</small>
                        </div>
                    </div>

                @endforeach





            </div>
        </div>
    </section>

@endif

    @if(count($testimonials) > 0)

    <section class="content bg-graz">
      <div class="container">
        <div>
          <h3 class="header-title">testimonies</h3>
          <div class="marker">
            <div class="line"></div>
            <div class="circle"></div>
            <div class="line"></div>
          </div>
        </div>

        <div class="w-full flex justify-center items-center overflow-hidden">
          <div class="testimony-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->

              @foreach($testimonials as $test)
              <div class="swiper-slide">
                <div
                  class="flex flex-col justify-between p-3 rounded-md shadow-lg bg-white h-[300px] w-[300px]"
                >
                  <p class="text-sm text-blac">
                    {{$test->content}}
                  </p>

                  <div
                    class="flex space-x-2 justify-center items-center border-t pt-3"
                  >
                    <img
                      class="w-[50px] h-[50px] rounded-full"
                      src="{{asset($test->image)}}"
                      alt="testifier"
                    />
                    <div>
                      <p class="font-[600] text-md">{{$test->name}}</p>
                      <p class="text-sm text-scarlet">{{$test->title}}</p>
                    </div>
                  </div>
                </div>
              </div>
             @endforeach

            </div>
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->

            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div> -->
            <!-- <div class="swiper-button-next"></div> -->

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
          </div>
        </div>
      </div>
    </section>
@endif
    <section class="content">
      <div class="px-[2rem] lg:px-[4rem]">
        <div>
          <div>
            <h3 class="header-title">Our Locations</h3>
            <div class="marker">
              <div class="line"></div>
              <div class="circle"></div>
              <div class="line"></div>
            </div>
          </div>
          <section class="location">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.752065526282!2d3.2093743741161!3d6.677608821355091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b99eeb1eca285%3A0xefdb0c28bc0ca484!2sCKEM%20INTERNATIONAL!5e0!3m2!1sen!2sng!4v1704633384151!5m2!1sen!2sng"
              width="100%"
              height="300"
              style="border: 3px"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </section>
        </div>
      </div>
    </section>

    @include('frontend.salvation')

@endsection
