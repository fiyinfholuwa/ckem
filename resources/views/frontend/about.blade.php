@extends('frontend.app')



@section('content')
<section
      style="background-image: url({{asset('frontend/assets/img/prayer.avif')}})"
      class="banner relative"
    >
      <div class="overlay2"></div>
      <h1>ABOUT US</h1>
      <p class="text-white">
        <span class="text-graz font-bold">Home</span> / About Us
      </p>
    </section>

    <section class="content">
      <div class="px-[2rem] md:px-[4rem]">
        <div class="flex flex-col lg:flex-row gap-8">
          <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
              class="shadow rounded-md bg-ash hover:scale-105 hover:bg-yellow hover:shadow-md h-[250px] p-4 transition duration-500 ease-in-out w-full flex flex-col space-y-4 justify-center items-center"
            >
              <h3 class="text-center text-[20px] font-[600]">Our Vision</h3>
              <div class="h-[2px] w-[30%] bg-blac rounded-full"></div>
              <p class="text-center opacity-[0.7] text-sm">
                To raise an Army for the Expansion of God's Kingdom. <br />
                Hebrews 11:33-34
              </p>
            </div>
            <div
              class="shadow rounded-md bg-ash hover:scale-105 hover:bg-yellow hover:shadow-md h-[250px] p-4 transition duration-500 ease-in-out w-full flex flex-col space-y-4 justify-center items-center"
            >
              <h3 class="text-center text-[20px] font-[600]">Our Mission</h3>
              <div class="h-[2px] w-[30%] bg-blac rounded-full"></div>
              <p class="text-center opacity-[0.7] text-sm">
                To convert sinner/seeker to Saint, Saint to Member, Member to
                Worker, Worker to Minister and Minister to Soldier.
              </p>
            </div>
            <div
              class="shadow rounded-md bg-ash hover:scale-105 hover:bg-yellow hover:shadow-md h-[250px] p-4 transition duration-500 ease-in-out w-full flex flex-col space-y-4 justify-center items-center"
            >
              <h3 class="text-center text-[20px] font-[600]">Our Tenets</h3>
              <div class="h-[2px] w-[30%] bg-blac rounded-full"></div>
              <p class="text-center opacity-[0.7] text-sm">
                We believe in the word of God. 2Timothy 3:16. <br />
                We believe in the absolute trinity of the eternal God. <br />
                1John 5:7-8. <br />
                We believe in the gospel of our Lord Jesus.
              </p>
            </div>
            <div
              class="shadow rounded-md bg-ash hover:scale-105 hover:bg-yellow hover:shadow-md h-[250px] p-4 transition duration-500 ease-in-out w-full flex flex-col space-y-4 justify-center items-center"
            >
              <h3 class="text-center text-[20px] font-[600]">Our Tenets</h3>
              <div class="h-[2px] w-[30%] bg-blac rounded-full"></div>
              <p class="text-center opacity-[0.7] text-sm">
                We believe that Salvation is by Grace through Faith and not by
                works. <br />
                We believe in Tithing. <br />
                We believe in one man and one wife. <br />
                We believe in the second coming of our Lord Jesus Christ.
              </p>
            </div>
          </div>
          <div class="flex-1 flex flex-col lg:flex-col">
            <div class="flex-1 w-full lg:w-1/2 relative">
              <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  <div class="swiper-slide">
                    <div
                      style="background-image: url({{asset('frontend/assets/img/church2.jpg')}})"
                      class="h-full w-full flex justify-center items-center flex-col gap-4 py-6"
                    >
                      <h1 class="font-[600] text-[32px] text-white">
                        Sunday Service
                      </h1>
                      <p>Every Sunday</p>
                      <p>8am - 11:30pm</p>
                      <div
                        class="w-full flex justify-center items-center gap-6"
                      >
                        <button
                          class="bg-blac text-white font-[500] text-sm md:text-lg w-[40%] py-[6px] hover:bg-scarlet border transition ease-in-out duration-500 hover:text-graz hover:border-none"
                        >
                          Locate a Church
                        </button>
                        <button
                          class="bg-blac text-white font-[500] text-sm md:text-lg w-[40%] py-[6px] hover:bg-scarlet border transition ease-in-out duration-500 hover:text-graz hover:border-none"
                        >
                          Join us Online
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div
                      style="background-image: url({{asset('frontend/assets/img/church1.jpg')}})"
                      class="h-full w-full flex justify-center items-center flex-col gap-4 py-6"
                    >
                      <h1 class="font-[600] text-[32px] text-white">
                        Healing/Deliverance Service
                      </h1>
                      <p>Every Tuesday</p>
                      <p>5:30pm - 7:30pm</p>
                      <div
                        class="w-full flex justify-center items-center gap-6"
                      >
                        <button
                          class="bg-blac text-white font-[500] text-sm md:text-lg w-[40%] py-[6px] hover:bg-scarlet border transition ease-in-out duration-500 hover:text-graz hover:border-none"
                        >
                          Locate a Church
                        </button>
                        <button
                          class="bg-blac text-white font-[500] text-sm md:text-lg w-[40%] py-[6px] hover:bg-scarlet border transition ease-in-out duration-500 hover:text-graz hover:border-none"
                        >
                          Join us Online
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div
                      style="
                        background-image: url({{asset('frontend/assets/img/bible\ study.avif')}});
                      "
                      class="h-full w-full flex justify-center items-center flex-col gap-4 py-6"
                    >
                      <h1 class="font-[600] text-[32px] text-white">
                        Bible Study
                      </h1>
                      <p>Every Thursday</p>
                      <p>5:30pm - 7:30pm/p></p>
                      <div
                        class="w-full flex justify-center items-center gap-6"
                      >
                        <button
                          class="bg-blac text-white font-[500] text-sm md:text-lg w-[40%] py-[6px] hover:bg-scarlet border transition ease-in-out duration-500 hover:text-graz hover:border-none"
                        >
                          Locate a Church
                        </button>
                        <button
                          class="bg-blac text-white font-[500] text-sm md:text-lg w-[40%] py-[6px] hover:bg-scarlet border transition ease-in-out duration-500 hover:text-graz hover:border-none"
                        >
                          Join us Online
                        </button>
                      </div>
                    </div>
                  </div>
                  ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
              </div>
            </div>
            <div class="flex-1">
              <div
                style="background-image: url('/assets/img/church1.jpg')"
                class="h-full w-full flex justify-center items-center py-12"
              >
                <button
                  class="w-[40%] py-[6px] hover:bg-scarlet transition ease-in-out duration-500 hover:text-graz border-none bg-yellow"
                >
                  View Events
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="px-[2rem] md:px-[4rem]">
        <div>
          <h3 class="header-title">Church History</h3>
          <div class="marker">
            <div class="line"></div>
            <div class="circle"></div>
            <div class="line"></div>
          </div>
        </div>

        <div class="space-y-6">
          <div class="space-y-2">
            <h1 class="font-bold">How We Started</h1>

            <p>
              CHRIST KINGDOM EXPANSION MISSION INT`L was founded by God through
              His servants Pastor Solomon Olayori Oyerinde and his dear wife
              Pastor (Mrs) Dorcas Titilayo Oyerinde (Now Pastor (Mrs) Dorcas
              Titilayo Adetula). <br />
              <br />
              Pastor S.O Oyerinde was born on the 3rd of May 1955 into the
              family of late Pa. Jacob Akanbi Oyerinde and Madam Abigail Ololade
              Oyerinde at Omogbagba`s compound, Owu, Totoro, Abeokuta as the
              last child of the family. As a man so thirsty for the Word of God,
              after his primary and secondary education, he gained admission
              into Life Theology Seminary Ikorodu Lagos, an institution of Four
              Square Gospel Church, in 1989 and graduated in 1992. After this
              period of preparation and training, God called him into full time
              ministry which birthed this great commission; CHRIST KINGDOM
              EXPANSION MISSION INT`L. <br />
              <br />
              The church started in brother Nathaniel Olugbemi's house at Sango
              with an attendance of about 7 members under a palm tree. Then the
              church later moved to 1, Kingdom lane off Arinko road, Sango where
              it was commissioned on Sunday 17th July 1994. Another branch was
              established on good friday, 6th of April 2006 at 4/5 Daniel Asuku
              street, Progress Estate, Afobaje, Ota Ogun state which now serve
              as the headquarters of the church. <br />
              <br />
              In 2007 when Pastor Solomon Oyerinde was preparing to meet his
              Creator, Months before the day he finally went to be with the
              Lord, he spoke about his death, gave detailed instructions about
              the church and where he is to be buried to his beloved wife. Few
              days before he was caught up in glory, he sent for his wife and
              spent several hours sharing with her details of the covenant and
              the plans of the Lord for the church and commissioned her to be
              his successor. Pastor Solomon Olayori Oyerinde finally went to be
              with The Lord on the 23rd of November 2007 after a brief illness.
            </p>
          </div>
          <div class="space-y-2">
            <h1 class="font-bold">Where we are now</h1>

            <p>
              Today, under the leadership of our new beloved General Overseer,
              Pastor (Dr) Dorcas Titilayo Adetula, CHRIST KINGDOM EXPANSION
              MISSION INT`L has experienced remarkable growth having two more
              branches at Ijoko and Ibogun while the church building at the
              headquaters has been developed into an edifice. The church is
              flourishing and witnessing a surge in congregation size, spiritual
              engagement and community impact. Notably, the church's impact has
              extended beyond its walls through impactful outreach initiatives.
              In essence, the church's narrative under the new leadership is one
              of dynamic expansion, spiritual enrichment and a deepened
              commitment to serving The Lord.
            </p>
          </div>
          <div class="space-y-2">
            <h1 class="font-bold">Where we want to be</h1>

            <p>
              The church is presently on a kingdom assignment of raising one
              million soldiers come 2044.
            </p>
          </div>
        </div>
      </div>
    </section>

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
    @include('frontend.salvation')
@endsection
