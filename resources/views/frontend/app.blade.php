<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('frontend/styles/main.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/styles/landing.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/styles/contact.css')}}" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Oswald:wght@600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <script
      src="https://kit.fontawesome.com/2cb29d167e.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" >

    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              scarlet: "#bd302d",
              yellow: "#e2a822",
              graz: "#d2d0b8",
              ash: "#e6f1ef",
              blac: "#2f2f2c",
            },
            FontFace: {
              int: "Inter, San",
            },
          },
        },
      };
    </script>
    <title>CKEM</title>
  </head>
  <body class="relative">
    <header id="nav" class="fixed z-[9999] w-full py-3">
      <nav class="flex px-[4rem] justify-between items-center w-full">
        <div>
          <a href="{{route('home')}}"
            ><img
              class="h-[60px] w-[60px]"
              src="{{asset('frontend/assets/img/ckem logo.png')}}"
              alt="Logo"
          /></a>
        </div>

        <ul id="sidebar" class="nav-container">
    <div class="absolute opacity-10 z-[-1] block lg:hidden">
        <img src="{{ asset('frontend/assets/img/ckem logo.png') }}" alt="" />
    </div>
    <li><a class="text-white{{ request()->routeIs('home') ? ' active' : '' }}" href="{{ route('home') }}">Home</a></li>
    <li><a class="text-white{{ request()->routeIs('about') ? ' active' : '' }}" href="{{ route('about') }}">About Us</a></li>

    <li><a class="text-white{{ request()->routeIs('events') ? ' active' : '' }}" href="{{ route('events') }}">Events</a></li>
    <li><a class="text-white{{ request()->routeIs('sermons') ? ' active' : '' }}" href="{{ route('sermons') }}">Sermons</a></li>
    <li><a class="text-white{{ request()->routeIs('donation') ? ' active' : '' }}" href="{{ route('donation') }}">Donations</a></li>

    <li><a class="text-white{{ request()->routeIs('media') ? ' active' : '' }}" href="{{route('media')}}">Media</a></li>

    <li><a class="text-white {{ request()->routeIs('blog') ? ' active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
            <li><a class="text-white{{ request()->routeIs('contact') ? ' active' : '' }}" href="{{ route('contact') }}">Contact Us</a></li>
            <a style="padding: 20px;" href="{{route('login')}}">
                <button class="pryBtn block lg:hidden w-full shadow transition">
        Login
    </button>
            </a>
</ul>

        @auth()
            @if(Auth::user()->user_type == 3)
                  <a href="{{route('dashboard')}}">
                      <button class="pryBtn w-[150px] shadow transition hidden lg:block">
                          Dashboard
                      </button>
                  </a>
              @elseif(Auth::user()->user_type == 2)
                  <a href="{{route('dashboard')}}">
                      <button class="pryBtn w-[150px] shadow transition hidden lg:block">
                          Dashboard
                      </button>
                  </a>

            @endif

          @else
              <a href="{{route('login')}}">
                  <button class="pryBtn w-[150px] shadow transition hidden lg:block">
                      Login
                  </button>
              </a>
          @endauth
        <button id="toogleBtn" class="text-graz block lg:hidden">
          <i id="tooglerIcon" class="fa fa-bars"></i>
        </button>
      </nav>
    </header>

    <!-- -----------------------------------------------------
    HERO
    ------------------------------------------------------->


    <!-- <section class="">
      <div class="container">
        <div>
          <h1>We are on a mission to give Jesus Christ to the World</h1>
        </div>
        <div>

        </div>

      </div>
    </section> -->

    @yield('content')

    <footer class="bg-black text-white w-full px-[2rem] lg:px-[4rem] pt-[3rem]">
      <div
        class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 pb-[3rem]"
      >
        <div class="space-y-4">
          <div class="flex space-x-2 justify-start items-center">
            <img
              class="w-[60px] h-[60px]"
              src="{{asset('frontend/assets/img/ckem logo.png')}}"
              alt="Logo"
            />
            <h1 class="font-[700] text-2xl">CKEM INT'L</h1>
          </div>

          <p class="text-graz text-sm">
            ...raising an Army for the Expansion of God's Kingdom. Hebrews
            11:33-34
          </p>

          <div></div>
        </div>
        <div class="space-y-4">
          <h3 class="hd1">Quick Link</h3>
          <ul class="text-graz text-sm space-y-2">
            <li><a href="{{route('about')}}">About Us</a></li>
            <!-- <li><a href="">Our Sermons</a></li> -->
            <li><a href="{{route('events')}}">Our Events</a></li>
            <li><a href="{{route('donation')}}">Donations</a></li>
          </ul>
        </div>
        <div class="space-y-4">
          <h3 class="hd1">Contact Us</h3>
          <ul class="text-graz text-sm space-y-2">
            <li>
              Address: 5&6 Daniel Asuku Str, <br />Progress Estate, Off Obasanjo
              road, <br />Ota, <br />
              Ogun State.
            </li>
            <li><a href="">Phone: +2349138503592</a></li>
            <li><a href="">Email: ckeminternational@gmail.com</a></li>
            <li class="bg-white w-full px-2 py-1">
              <input
                class="bg-transparent outline-none text-blac"
                type="text"
                placeholder="Subscribe for News Letters"
              />
              <button class="h-full pryBtn px-3">Subscribe</button>
            </li>
          </ul>
        </div>
        <div>
          <!-- <h3 class="hd1">Recent Post</h3> -->
        </div>
      </div>

      <div class="border-t py-3">
        <p class="text-center text-sm text-[#f4f4f4]">
          © 2024 CKEM INT'L. All Rights Reserved.
        </p>
      </div>
    </footer>
    <script>
      ((g) => {
        var h,
          a,
          k,
          p = "The Google Maps JavaScript API",
          c = "google",
          l = "importLibrary",
          q = "__ib__",
          m = document,
          b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
          r = new Set(),
          e = new URLSearchParams(),
          u = () =>
            h ||
            (h = new Promise(async (f, n) => {
              await (a = m.createElement("script"));
              e.set("libraries", [...r] + "");
              for (k in g)
                e.set(
                  k.replace(/[A-Z]/g, (t) => "_" + t[0].toLowerCase()),
                  g[k]
                );
              e.set("callback", c + ".maps." + q);
              a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
              d[q] = f;
              a.onerror = () => (h = n(Error(p + " could not load.")));
              a.nonce = m.querySelector("script[nonce]")?.nonce || "";
              m.head.append(a);
            }));
        d[l]
          ? console.warn(p + " only loads once. Ignoring:", g)
          : (d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)));
      })({ key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "weekly" });
    </script>
    <script>
      AOS.init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('frontend/scripts/script.js')}}"></script>
    <script src="{{asset('frontend/scripts/testimony.js')}}"></script>

    <script>
      const txts = document.querySelector(".hero-content-container").children,
        txtsLen = txts.length;
      let index = 0;
      const textInTimer = 10000,
        textOutTimer = 0;

      function animateText() {
        for (let i = 0; i < txtsLen; i++) {
          txts[i].classList.remove("text-in", "text-out");
        }
        txts[index].classList.add("text-in");

        setTimeout(function () {
          txts[index].classList.add("text-out");
        }, textOutTimer);

        setTimeout(function () {
          if (index == txtsLen - 1) {
            index = 0;
          } else {
            index++;
          }
          animateText();
        }, textInTimer);
      }

      window.onload = animateText;
    </script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>


 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'success':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'warning':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'error':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #ff0000, #ff0000)" }
    }).showToast();
    break;
 }
 @endif

</script>


  </body>
</html>
