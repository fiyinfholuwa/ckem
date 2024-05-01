<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEM - Login</title>
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Oswald:wght@600&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="{{asset('frontend/styles/main.css')}}" />
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
</head>
<body>
    <section style="background-image: url('/assets/img/church1.jpg');" class="flex justify-center items-center w-full h-[100vh] bg-no-repeat bg-cover bg-center">
        <form action="{{route('login')}}" method="post" data-aos="flip-up" class="p-10 flex flex-col justify-between rounded-lg shadow-lg h-[50vh] md:h-[70vh] w-[80%] lg:w-[60%] xl:w-[40%]  glass relative">
            @csrf
            <div class="flex w-full justify-center items-center">
                <img src="{{asset('frontend/assets/img/ckem logo.png')}}" alt="logo" class=" h-[60px] w-[60px]">
            </div>
            <a  style="background-color: #23272b" href="{{route('home')}}" class="w-1/4 bg-scarlet text-white font-[700] hover:bg-blac transition-all ease-in-out duration-500 flex justify-center p-3 items-center rounded-md">Go Home</a>
            <h1 class="text-center font-[700] text-[24px] md:text-[32px] text-blac">WELCOME BACK ! </h1>


            <div class="space-y-6 ">
                <div class="w-full border-b rounded-xl shadow-lg ">
                    <input name="email" class="bg-transparent p-3 w-full outline-none focus:bg-ash transition-all ease-in-out duration-500 rounded-xl placeholder:text-blac text-md" type="text" placeholder="Enter Email">
                    @error('email')
                    <p style="color: red; font-weight: bolder">{{$message}}</p>
                    @enderror
                </div>

                <div class="w-full border-b rounded-xl shadow-lg flex space-x-2 relative">
                    <input name="password" id="password" class="bg-transparent p-3 w-full outline-none focus:bg-ash transition-all ease-in-out duration-500 rounded-xl placeholder:text-blac" type="password" placeholder="Enter Password">
                    @error('password')
                    <p style="color: red; font-weight: bolder">{{$message}}</p>
                    @enderror
                    <button type="button" id="show" class="absolute right-5 top-3" onclick="togglePasswordVisibility()"><i id="icon" class="fa-regular fa-eye"></i></button>

                    <script>
                        function togglePasswordVisibility() {
                            var passwordInput = document.getElementById("password");
                            var icon = document.getElementById("icon");
                            if (passwordInput.type === "password") {
                                passwordInput.type = "text";
                                icon.classList.remove("fa-eye");
                                icon.classList.add("fa-eye-slash");
                            } else {
                                passwordInput.type = "password";
                                icon.classList.remove("fa-eye-slash");
                                icon.classList.add("fa-eye");
                            }
                        }
                    </script>

                </div>
            </div>


            <input class="w-1/2 bg-scarlet text-white font-[700] hover:bg-blac transition-all ease-in-out duration-500 flex justify-center p-3 items-center rounded-md" type="submit" value="Sign In">


        </form>
    </section>
    <script>
        showBtn.addEventListener('click', function(){
            if (showIcon.classList.contains('fa-eye')){
                showIcon.classList.remove('fa-eye')
                showIcon.classList.add('fa-eye-slash')
                passwordInput.type = 'text'
            }else{
                showIcon.classList.add('fa-eye')
                showIcon.classList.remove('fa-eye-slash')
                passwordInput.type = 'password'
            }
        })
    </script>
    <script>
        AOS.init();
      </script>
</body>
</html>
