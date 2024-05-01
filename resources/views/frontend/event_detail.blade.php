@extends('frontend.app')



@section('content')
<section style="background-image:url({{asset('frontend/assets/img/blog.avif')}});" class="banner relative">
        <div class="overlay2"></div>
        <h1>EVENT DETAILS</h1>
        <p class="text-white"><span class="text-graz font-bold">Home</span> / Event Details</p>
    </section>

    <section class="content">
        <div class="px-[2rem] md:px-[4rem] flex flex-col lg:flex-row gap-10 w-full" >
            <div class="w-full lg:w-8/12">
                <div class="space-y-6">
                  <div class="flex flex-col gap-6">
                    <div class="">
                       <img src="{{asset($event->image)}}" class=" w-full" alt="">
                    </div>
                    <div class=" space-y-4">
                      <!-- <h1 class="font-bold ">Title: <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, error! Ut deleniti quaerat consequuntur iusto.</span></h1> -->
                      <h1 class="font-bold ">Venue: <span>Church Auditorium</span></h1>
                      <h1 class="font-bold ">Date: <span>{{$event->start_date}}</span></h1>
                    </div>                                
                  </div>


                    <p><span class="font-bold"></span>{!! $event->body !!}</p>

                </div>
            </div>
            <div class="w-full lg:w-4/12 h-full ">
              <div class="bg-ash p-6 space-y-6">
                <!-- add comments -->
                <h6 class="font-bold text-scarlet text-2xl ">Register to Attend!</h6>
                <form class="space-y-6" action="{{route('attendance.event.save')}}" method="post">
                    @csrf
                    <div>
                        <p class="text-blac text-sm font-bold">Full Name</p>
                        <input class="w-full border-scarlet rounded-lg shadow-lg p-2" name="full_name" required placeholder="Enter Full Name" type="text">
                    </div>
                    <div>
                        <p class="text-blac text-sm font-bold">Email</p>
                        <input class="w-full border-scarlet rounded-lg shadow-lg p-2" name="email" required placeholder="Enter Full Email" type="text">
                    </div>
                    <div>
                        <p class="text-blac text-sm font-bold">Date of Birth</p>
                        <input class="w-full border-scarlet rounded-lg shadow-lg p-2" name="dob" required placeholder="Enter Phone" type="month">
                    </div>


                    <div>
                        <p class="text-blac text-sm font-bold">Phone Number (preferred whatsapp number)</p>
                        <input name="phone" class="w-full border-scarlet rounded-lg shadow-lg p-2" required placeholder="Enter Phone" type="number">
                    </div>
                    <div>
                        <p class="text-blac text-sm font-bold">Home Address</p>
                        <input name="address" class="w-full border-scarlet rounded-lg shadow-lg p-2" required placeholder="Enter Full Address" type="text">
                    </div>

                    <input type="hidden" name="event_name" value="{{$event->id}}" />

                    <div>
                        <p class="text-blac text-sm font-bold">Occupation (if student, kindly state your school)</p>
                        <input name="occupation" class="w-full border-scarlet rounded-lg shadow-lg p-2" required placeholder="Enter Occupation" type="text">
                    </div>


                    <div>
                        <p class="text-blac text-sm font-bold">Have you attended Youth Conference before?</p>
                        <select  class="w-full border-scarlet rounded-lg shadow-lg p-2" required name="attend_before">
                            <option>Please select option</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                        </select>
                        
                    </div>


                    <div>
                        <p class="text-blac text-sm font-bold">Where did you hear about this program?</p>
                        <select  class="w-full border-scarlet rounded-lg shadow-lg p-2" required name="hear_about">
                            <option>Please select option</option>
                            <option value="Facebook">Facebook</option>
                            <option value="A Friend or Colleague">A Friend or Colleague</option>
                            <option value="Church Evangelism Team">Church Evangelism Team</option>
                            <option value="Instagram Post">Instagram Post</option>
                            <option value="Others">Others</option>
                        </select>
                        
                    </div>





                    <button type="submit" class="w-full rounded-lg shadow-lg bg-scarlet text-white transition-all ease-in-out duration-500 hover:bg-blac p-3">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </section>
@include('frontend.salvation')
@endsection