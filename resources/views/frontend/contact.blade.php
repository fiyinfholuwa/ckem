@extends('frontend.app')

@section('content')

<section
      style="background-image: url({{asset('frontend/assets/img/sermon.avif')}})"
      class="banner relative"
    >
      <div class="overlay2"></div>
      <h1>CONTACT US</h1>
      <p class="text-white">
        <span class="text-graz font-bold">Home</span> / Contact Us
      </p>
    </section>

    <section class="location">
      <div>
        <h3 class="header-title">Locate Us via Google Map</h3>
        <div class="marker">
          <div class="line"></div>
          <div class="circle"></div>
          <div class="line"></div>
        </div>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.752065526282!2d3.2093743741161!3d6.677608821355091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b99eeb1eca285%3A0xefdb0c28bc0ca484!2sCKEM%20INTERNATIONAL!5e0!3m2!1sen!2sng!4v1704633384151!5m2!1sen!2sng"
        width="600"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </section>

    <div class="">
      <h3 class="header-title">We'll Like to Hear From You</h3>
      <div class="marker !mb-0">
        <div class="line"></div>
        <div class="circle"></div>
        <div class="line"></div>
      </div>
    </div>
    <section class="bg-ash py-6 contact us">
      <div class="row px-[2rem] md:px-[8rem]">
        <div class="contact-col">
          <div>
            <i class="fa fa-home"></i>
            <span>
              <h5 class="!font-bold text-blac">CKEM INT'L HQ</h5>
              <p class="text-sm">
                5&6 Daniel Asuku Str, <br />Progress Estate, Off Obasanjo road,
                <br />Ota, <br />
                Ogun State.
              </p>
            </span>
          </div>

          <div>
            <i class="fa fa-phone"></i>
            <span>
              <h5 class="!text-sm">+2349138503592</h5>
              <p class="text-sm">
                Monday 9AM - 6PM <br />
                Tuesday 9AM - 8PM <br />
                Wednesday 9AM - 6PM <br />
                Thursday 9AM - 8PM <br />
                Friday 9AM - 6PM <br />
                Saturday 7AM - 2PM
              </p>
            </span>
          </div>

          <div>
            <i class="fa fa-envelope-o"></i>
            <span>
              <h5 class="text-sm">ckeminternational@gmail.com</h5>
              <p></p>
            </span>
          </div>
        </div>
        <div class="contact-col">
          <form action="{{route('contact.save')}}">
            @csrf
            <span>
              <h6>LEAVE A MESSAGE</h6>
            </span>
            <input name ="name"
              class="rounded-lg shadow-lg focus:border-scarlet"
              type="text"
              placeholder="Enter your name"
              required
            />
            <input
              type="email" name="email"
              placeholder="Enter email address"
              required
              class="rounded-lg shadow-lg focus:border-scarlet"
            />

            <input
              type="number" name="phone"
              placeholder="Enter phone Number"
              required
              class="rounded-lg shadow-lg focus:border-scarlet"
            />

            <input name="subject"
              class="rounded-lg shadow-lg focus:border-scarlet"
              type="text"
              placeholder="Enter your subject"
              required
            />
            <textarea name="message"
              class="rounded-lg shadow-lg focus:border-scarlet"
              rows="8"
              Message
              placeholder="Message"
            ></textarea>
            <button
              type="submit"
              class="hero-btn red-btn bg-scarlet text-white shadow-lg"
            >
              SUBMIT MESSAGE
            </button>
          </form>
        </div>
      </div>
    </section>

@include('frontend.salvation')
@endsection