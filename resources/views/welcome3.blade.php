<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/frontend/styles/main.css" />
    <link rel="stylesheet" href="/frontend/styles/landing.css" />
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
          <a href="/"
            ><img
              class="h-[60px] w-[60px]"
              src="/assets/img/ckem logo.png"
              alt="Logo"
          /></a>
        </div>

        <ul id="sidebar" class="nav-container">
          <div class="absolute opacity-10 z-[-1] block lg:hidden">
            <img src="/assets/img/ckem logo.png" alt="" />
          </div>
          <li><a class="text-white active" href="/">Home</a></li>
          <li><a class="text-white" href="/pages/about.html">About Us</a></li>
          <li>
            <a class="text-white" href="/pages/contact.html">Contact Us</a>
          </li>
          <li><a class="text-white" href="/pages/sermons.html">Sermons</a></li>
          <li><a class="text-white" href="/pages/events.html">Events</a></li>
          <li>
            <a class="text-white" href="/pages/donation.html">Donations</a>
          </li>
          <li><a class="text-white" href="/pages/blog.html">Blog</a></li>
          <button class="pryBtn block lg:hidden w-full shadow transition">
            Watch Live
          </button>
        </ul>

        <a href="/pages/media.html">
          <button class="pryBtn w-[150px] shadow transition hidden lg:block">
            Watch Live
          </button>
        </a>
        <button id="toogleBtn" class="text-graz block lg:hidden">
          <i id="tooglerIcon" class="fa fa-bars"></i>
        </button>
      </nav>
    </header>

    <!-- -----------------------------------------------------
    HERO
    ------------------------------------------------------->

    <section class="hero flex justify-center items-center flex-col">
      <div class="overlay"></div>
      <div class="social-icon">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
        <a href=""><i class="fa-brands fa-x-twitter"></i></a>
      </div>
      <div class="container">
        <div class="hero-content space-y-0">
          <p class="flex space-x-4 items-center">
            <img
              src="/assets/img/subtitle-img-white.png"
              width="32"
              height="5"
              alt="Wavy line"
            />

            <span class="text-[#fff] text-lg">Welcome to</span>

            <img
              src="./assets/img/subtitle-img-white.png"
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

              <button class="pryBtn2 bg-blac shadow-md px-[16px]">
                Relate With Us
              </button>
            </div>
            <div class="box">
              <p class="hero-text md:w-[100%] text-center text-graz mb-8">
                ...raising an Army for the Expansion of God's Kingdom. Hebrews
                11:33-34
              </p>

              <button class="pryBtn2 bg-scarlet shadow-md px-[16px]">
                Connect With Us
              </button>
            </div>
            <div class="box">
              <p class="hero-text md:w-[100%] text-center text-graz mb-8">
                ...raising an Army for the Expansion of God's Kingdom. Hebrews
                11:33-34
              </p>

              <button class="pryBtn2 shadow-md px-[16px]">Join With Us</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section class="">
      <div class="container">
        <div>
          <h1>We are on a mission to give Jesus Christ to the World</h1>
        </div>
        <div>

        </div>

      </div>
    </section> -->

    <section class="lead-pastor bg-ash py-12">
      <div class="container flex flex-col lg:flex-row gap-4">
        <div class="flex-1 flex justify-center items-center">
          <img
            class="h-[400px] lg:h-[500px]"
            src="/assets/img/Mummy G.O 3.png"
            alt=""
          />
        </div>
        <div class="flex-1">
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
          <div class="sermon-card shadow-md bg-ash">
            <div class="sermon-img">
              <div class="sermon-overlay border gap-4">
                <button class="border">
                  <i class="fa-solid fa-play"></i> Listen
                </button>
                <button class="border">
                  <i class="fa-solid fa-download"></i> Download
                </button>
              </div>
              <img
                class="w-full h-full"
                src="/assets//img/sermon1.jpg"
                alt=""
              />
            </div>
            <div class="p-3">
              <h3 class="font-[600] text-blac text-lg">The Life of God</h3>
              <p class="italic text-scarlet">by: Pastor Mic Mike</p>
            </div>
          </div>
          <div class="sermon-card shadow-md bg-ash">
            <div class="sermon-img">
              <div class="sermon-overlay border gap-4">
                <button class="border">
                  <i class="fa-solid fa-play"></i> Listen
                </button>
                <button class="border">
                  <i class="fa-solid fa-download"></i> Download
                </button>
              </div>
              <img
                class="w-full h-full"
                src="/assets//img/sermon2.jpg"
                alt=""
              />
            </div>
            <div class="p-3">
              <h3 class="font-[600] text-blac text-lg">The Life of God</h3>
              <p class="italic text-scarlet">by: Pastor Mic Mike</p>
            </div>
          </div>
          <div class="sermon-card shadow-md bg-ash">
            <div class="sermon-img">
              <div class="sermon-overlay border gap-4">
                <button class="border">
                  <i class="fa-solid fa-play"></i> Listen
                </button>
                <button class="border">
                  <i class="fa-solid fa-download"></i> Download
                </button>
              </div>
              <img
                class="w-full h-full"
                src="/assets//img/sermon3.jpg"
                alt=""
              />
            </div>
            <div class="p-3">
              <h3 class="font-[600] text-blac text-lg">The Life of God</h3>
              <p class="italic text-scarlet">by: Pastor Mic Mike</p>
            </div>
          </div>
        </div>

        <div class="w-full flex justify-center items-center mt-12">
          <a href="/pages/sermons.html">
            <button class="pryBtn w-[150px] shadow transition hidden lg:block">
              See More
            </button>
          </a>
        </div>
      </div>
    </section>

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
          <div class="pastor-card shadow-md">
            <div class="h-[80%] mb-3 relative">
              <img
                class="w-full h-full object-contain"
                src="/assets//img/pst segun (2).png"
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
              <h3 class="font-[600]">Pastor S. Ogunsola</h3>
              <small class="text-yellow">Resident Pastor</small>
            </div>
          </div>
          <div class="pastor-card shadow-md">
            <div class="h-[80%] mb-3 relative">
              <img
                class="w-full h-full object-cover"
                src="/assets//img/IMG_8777.JPG"
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
              <h3 class="font-[600]">Pastor (Mrs) P. Omotosho</h3>
              <small class="text-yellow">Church Secretary</small>
            </div>
          </div>
          <div class="pastor-card shadow-md">
            <div class="h-[80%] mb-3 relative">
              <img
                class="w-full h-full object-cover"
                src="/assets//img/IMG_8775.JPG"
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
              <h3 class="font-[600]">Pastor T Tomori</h3>
              <small class="text-yellow">Ijoko Branch Pastor</small>
            </div>
          </div>
          <div class="pastor-card shadow-md">
            <div class="h-[80%] mb-3 relative">
              <img
                class="w-full h-full object-cover"
                src="/assets//img/IMG_8773.JPG"
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
              <h3 class="font-[600]">Pastor I. Fadiji</h3>
              <small class="text-yellow">Ibogun Branch Pastor</small>
            </div>
          </div>
        </div>
      </div>
    </section>

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
              <div class="swiper-slide">
                <div
                  class="flex flex-col justify-between p-3 rounded-md shadow-lg bg-white h-[300px] w-[250px]"
                >
                  <p class="text-sm text-blac">
                    I was going through a difficult time with a chronic illness.
                    The prayers and support from my church community were
                    incredible. Through God's grace and the power of prayer, I
                    experienced healing beyond medical explanation. I am now a
                    living testimony to the miracles that happen when we trust
                    in God's plan.
                  </p>

                  <div
                    class="flex space-x-2 justify-center items-center border-t pt-3"
                  >
                    <img
                      class="w-[50px] h-[50px] rounded-full"
                      src="/assets/img/church2.jpg"
                      alt="testifier"
                    />
                    <div>
                      <p class="font-[600] text-md">Mr Segun Oluwaseun</p>
                      <p class="text-sm text-scarlet">Lagos, Nigeria</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div
                  class="flex flex-col justify-between p-3 rounded-md shadow-lg bg-white h-[300px] w-[250px]"
                >
                  <p class="text-sm text-blac">
                    During a season of financial struggle, I turned to my faith
                    and asked my church for prayer. Miraculously, doors began to
                    open, unexpected opportunities arose, and debts were
                    cleared. God's provision was evident, teaching me the
                    importance of trusting Him with my finances.
                  </p>

                  <div
                    class="flex space-x-2 justify-center items-center border-t pt-3"
                  >
                    <img
                      class="w-[50px] h-[50px] rounded-full"
                      src="/assets/img/church2.jpg"
                      alt="testifier"
                    />
                    <div>
                      <p class="font-[600] text-md">Mr Segun Oluwaseun</p>
                      <p class="text-sm text-scarlet">Lagos, Nigeria</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div
                  class="flex flex-col justify-between p-3 rounded-md shadow-lg bg-white h-[300px] w-[250px]"
                >
                  <p class="text-sm text-blac">
                    Our family was fractured, torn apart by misunderstandings
                    and strife. Through the guidance of our church community and
                    heartfelt prayers, we experienced a gradual restoration of
                    relationships. God's love and grace brought healing and
                    unity back into our family.
                  </p>

                  <div
                    class="flex space-x-2 justify-center items-center border-t pt-3"
                  >
                    <img
                      class="w-[50px] h-[50px] rounded-full"
                      src="/assets/img/church2.jpg"
                      alt="testifier"
                    />
                    <div>
                      <p class="font-[600] text-md">Mr Sola Oluwasegun</p>
                      <p class="text-sm text-scarlet">Sango Ota, Nigeria</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div
                  class="flex flex-col justify-between p-3 rounded-md shadow-lg bg-white h-[300px] w-[250px]"
                >
                  <p class="text-sm text-blac">
                    I had been searching for a job for months without success.
                    The church prayed fervently for me, and not long after, I
                    received a job offer that perfectly matched my skills and
                    needs. It was a clear answer to prayer and a reminder of
                    God's perfect timing.
                  </p>

                  <div
                    class="flex space-x-2 justify-center items-center border-t pt-3"
                  >
                    <img
                      class="w-[50px] h-[50px] rounded-full"
                      src="/assets/img/church2.jpg"
                      alt="testifier"
                    />
                    <div>
                      <p class="font-[600] text-md">Miss Adenike Fala</p>
                      <p class="text-sm text-scarlet">Lagos, Nigeria</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div
                  class="flex flex-col justify-between p-3 rounded-md shadow-lg bg-white h-[300px] w-[250px]"
                >
                  <p class="text-sm text-blac">
                    For years, I battled with addiction, feeling trapped and
                    helpless. With the support of my church family and their
                    unwavering prayers, I found the strength to overcome my
                    struggles. Today, I am living a transformed life, free from
                    the chains that once bound me.
                  </p>

                  <div
                    class="flex space-x-2 justify-center items-center border-t pt-3"
                  >
                    <img
                      class="w-[50px] h-[50px] rounded-full"
                      src="/assets/img/church2.jpg"
                      alt="testifier"
                    />
                    <div>
                      <p class="font-[600] text-md">Mr Stanley Abaji</p>
                      <p class="text-sm text-scarlet">Ogun, Nigeria</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div
                  class="flex flex-col justify-between p-3 rounded-md shadow-lg bg-white h-[300px] w-[250px]"
                >
                  <p class="text-sm text-blac">
                    For years, I battled with addiction, feeling trapped and
                    helpless. With the support of my church family and their
                    unwavering prayers, I found the strength to overcome my
                    struggles. Today, I am living a transformed life, free from
                    the chains that once bound me.
                  </p>

                  <div
                    class="flex space-x-2 justify-center items-center border-t pt-3"
                  >
                    <img
                      class="w-[50px] h-[50px] rounded-full"
                      src="/assets/img/church2.jpg"
                      alt="testifier"
                    />
                    <div>
                      <p class="font-[600] text-md">Mr Segun Oluwaseun</p>
                      <p class="text-sm text-scarlet">Lagos, Nigeria</p>
                    </div>
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
            <!-- <div class="swiper-scrollbar"></div> -->
          </div>
        </div>
      </div>
    </section>

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

    <section id="salvation">
      <div class="flex justify-center items-center h-[40vh] w-full">
        <div
          class="px-[2rem] lg:px-[4rem] w-full flex justify-between items-center flex-col gap-4 lg:flex-row"
        >
          <div>
            <h1 class="text-4xl md:w-[70%] leading-[50px]">
              Ready to begin your journey to destiny with Christ?
            </h1>
          </div>
          <div>
            <button
              class="p-3 w-[250px] rounded-2xl bg-scarlet shadow-lg font-bold text-white transition-all duration-500 ease-in-out hover:bg-white hover:text-scarlet hover:border-scarlet hover:border"
            >
              Become a Christian
            </button>
          </div>
        </div>
      </div>
      <div class="flex justify-center items-center relative h-[20vh] w-full">
        <div class="overlay3"></div>
        <div
          class="px-[2rem] lg:px-[4rem] flex justify-start md:justify-between items-center w-full flex-col gap-4 lg:flex-row"
        >
          <div>
            <h1 class="text-2xl text-white leading-[50px]">
              We'll like to guide you
              <span class="font-[500]">towards the right direction</span>
            </h1>
          </div>
          <div>
            <button
              class="p-3 w-[250px] font-[100] rounded-2xl bg-white shadow-lg font-bold text-scarlet transition-all duration-500 ease-in-out hover:bg-blac hover:text-scarlet"
            >
              Book for Counselling
            </button>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-black text-white w-full px-[2rem] lg:px-[4rem] pt-[3rem]">
      <div
        class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 pb-[3rem]"
      >
        <div class="space-y-4">
          <div class="flex space-x-2 justify-start items-center">
            <img
              class="w-[60px] h-[60px]"
              src="/assets/img/ckem logo.png"
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
            <li><a href="">About Us</a></li>
            <li><a href="">Our Sermons</a></li>
            <li><a href="">Our Events</a></li>
            <li><a href="">Donations</a></li>
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
          <h3 class="hd1">Recent Post</h3>
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
    <script src="/scripts/script.js"></script>
    <script src="/scripts/testimony.js"></script>

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
  </body>
</html>
