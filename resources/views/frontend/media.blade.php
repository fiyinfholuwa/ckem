@extends('frontend.app')



@section('content')
    <section
        style="background-image: url({{asset('frontend/assets/img/blog.avif')}})"
        class="banner relative"
    >
        <div class="overlay2"></div>
        <h1>Join Live</h1>
        <p class="text-white">
            <span class="text-graz font-bold">Home</span> / Media
        </p>
    </section>


        <section class="content">
            <div class="px-[2rem] md:px-[4rem]">
                <div>
                    <h3 class="header-title">Join Our Live Program</h3>
                    <div class="marker">
                        <div class="line"></div>
                        <div class="circle"></div>
                        <div class="line"></div>
                    </div>
                </div>


                    <div class="w-full grid grid-cols-1 gap-10 lg:grid-cols-3">

                        <div class="special-event-card shadow-md bg-ash rounded-2xl">
                            <div class="special-event-img">
                                <div class="special-event-overlay border gap-4">
                                    <h1 class="font-bold text-[36px] text-white">Facebook</h1>
                                    <p class="font-bold text-[16px] text-white">
                                    </p>
                                    <p class="font-bold text-[16px] text-white">

                                    </p>
                                    <a target="_blank" href="{{!is_null($media_link)  ? $media_link->facebook : '!#'}}"
                                    ><button
                                            class="font-bold text-[16px] text-scarlet bg-[white] px-6 hover:bg-scarlet hover:text-white transition-all ease-in-out duration-500 py-2 rounded-lg"
                                        >
                                            Join Live
                                        </button></a
                                    >
                                </div>
                                <img
                                    class="w-full h-full"
                                    src="https://neilpatel.com/wp-content/uploads/2017/09/facebook-live-brand-awareness.jpg"
                                    alt=""
                                />
                            </div>
                        </div>

                        <div class="special-event-card shadow-md bg-ash rounded-2xl">
                            <div class="special-event-img">
                                <div class="special-event-overlay border gap-4">
                                    <h1 class="font-bold text-[36px] text-white">YouTube</h1>
                                    <p class="font-bold text-[16px] text-white">
                                    </p>
                                    <p class="font-bold text-[16px] text-white">

                                    </p>
                                    <a target="_blank" href="{{!is_null($media_link) ? $media_link->youtube : '!#'}}"
                                    ><button
                                            class="font-bold text-[16px] text-scarlet bg-[white] px-6 hover:bg-scarlet hover:text-white transition-all ease-in-out duration-500 py-2 rounded-lg"
                                        >
                                            Join Live
                                        </button></a
                                    >
                                </div>
                                <img
                                    class="w-full h-full"
                                    src="https://spotme.com/wp-content/uploads/2020/12/Body2_The-Best-Virtual-Event-Platforms-that-Integrate-with-YouTube.png"
                                    alt=""
                                />
                            </div>
                        </div>

                        <div class="special-event-card shadow-md bg-ash rounded-2xl">
                            <div class="special-event-img">
                                <div class="special-event-overlay border gap-4">
                                    <h1 class="font-bold text-[36px] text-white">Mixrl Radio</h1>
                                    <p class="font-bold text-[16px] text-white">
                                    </p>
                                    <p class="font-bold text-[16px] text-white">

                                    </p>
                                    <a target="_blank" href="{{!is_null($media_link) ? $media_link->mixrl : '!#'}}"
                                    ><button
                                            class="font-bold text-[16px] text-scarlet bg-[white] px-6 hover:bg-scarlet hover:text-white transition-all ease-in-out duration-500 py-2 rounded-lg"
                                        >
                                            Join Live
                                        </button></a
                                    >
                                </div>
                                <img
                                    class="w-full h-full"
                                    src="https://play-lh.googleusercontent.com/mnbqp2yY-sza11woI7_WBnYA2OBoDykYeiKcwbHpcEjwJGX6jGEq-An4LO19KbyVSEA=w416-h235-rw"
                                    alt=""
                                />
                            </div>
                        </div>




                    </div>

            </div>
        </section>

    @include('frontend.salvation')
@endsection
