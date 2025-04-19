<!DOCTYPE html">
<html lang="en">
  <head>
    <?php
    include('head_content.php')
    
    ?>
     </head>
  <body>
    <header>
      <!-- Navigation -->
      <nav id="navigation">
        <div class="navbar bg-black">
          <div class="navbar-start">
            <!-- Dropdown menu -->
            <div class="dropdown">
              <div tabindex="0" role="button" class="hidden btn btn-ghost btn-circle">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h7"
                  />
                </svg>
              </div>
              <ul
                tabindex="0"
                class="hidden menu menu-sm dropdown-content bg-black rounded-box z-[1] mt-3 w-52 p-2 shadow"
              >
                <li><a>Homepage</a></li>
                <li><a>Portfolio</a></li>
                <li><a>About</a></li>
              </ul>
            </div>
          </div>

          <div class="navbar-center">
            <a class="btn btn-ghost text-xl">SkillPro</a>
          </div>

          <div class="navbar-end">
            <!-- Search button and input field -->
            <div class="relative">
              <button id="search-btn" class="btn btn-ghost btn-circle">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </button>
              <input
                id="search-input"
                type="text"
                placeholder="Search..."
                class="hidden absolute right-0 bg-black rounded-md p-2 mt-2"
                style="width: 150px"
              />
            </div>

            <!-- Notification button -->
            <button class="btn btn-ghost btn-circle">
              <div class="indicator">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                  />
                </svg>
                <span
                  class="badge badge-xs badge-primary indicator-item"
                ></span>
              </div>
            </button>
          </div>
        </div>

        <script>
          document
            .getElementById("search-btn")
            .addEventListener("click", function () {
              const searchInput = document.getElementById("search-input");
              searchInput.classList.toggle("hidden");
              searchInput.focus();
            });
        </script>

        <div class="navbar relative z-50">
          <div class="navbar-start">
            <!-- Dropdown menu and brand -->
            <div class="dropdown">
              <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h8m-8 6h16"
                  />
                </svg>
              </div>
              <ul
                tabindex="0"
                class="menu menu-sm dropdown-content rounded-box z-[1] mt-3 w-52 p-2 shadow bg-black text-white"
              >
              <li class="mark"><a >Home</a></li>
              <li>
                <a href="">Development</a>
              </li>
              <li>
               <a href=""> IT & Software</a>
              </li>

              <li>
               <a href=""> Design</a>
                 
              </li>

              <li><a>Instructors</a></li>
              <li><a href="FreeCourses.html">Free Courses</a></li>
                
              </ul>
            </div>

            <label class="flex cursor-pointer gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <circle cx="12" cy="12" r="5" />
                <path
                  d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"
                />
              </svg>
              <input
                type="checkbox"
                value="synthwave"
                class="toggle theme-controller"
              />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"
                ></path>
              </svg>
            </label>
          </div>

         

          <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
            <li class="mark"><a>Home</a></li>
              <li>
                <a href="#development">Development</a>
              </li>
              <li>
               <a href="#Software"> IT & Software</a>
              </li>

              <li>
               <a href="#Design"> Design</a>
                 
              </li>

              <li><a>Instructors</a></li>
              <li><a href="FreeCourses.html">Free Courses</a></li>
          </div>

          <div class="navbar-end">
            <a href="login.php" class="btn button">Login</a>
          </div>
        </div>
      </nav>
    </header>

    <!-- Main section  -->

    <main>
      <!-- Banner Section -->

      <section>
        <div
          class="w-full mx-auto flex flex-col md:flex-row items-center gap-5 bg-slate-800 lg:p-28 p-6"
        >
          <div class="md:w-1/2 flex flex-col items-start space-y-4">
            <h2 class="text-4xl font-bold text-white">LEARN AT HOME</h2>
            <p class="text-lg text-[#F69B32] font-semibold">
              Let's start with a free class
            </p>
            <p class="text-sm text-[#4e9ff4]">
              SkillPro is a premier online learning platform designed to empower
              students with in-depth computer science knowledge. Featuring top
              educators from Bangladesh, SkillPro offers expertly crafted
              courses that make mastering computer science accessible and
              engaging for learners at every level
            </p>

            <!-- banner button div -->
            <div class="flex space-x-2">
              <!-- Open the modal using ID.showModal() method -->
              <button
                class="btn bg-orange-500"
                onclick="my_modal_1.showModal()"
              >
                15% OFF IN THE FIRST TWO MONTHS
              </button>
              <dialog id="my_modal_1" class="modal">
                <div class="modal-box">
                  <div class="bg-gray-50 font-[sans-serif]">
                    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
                      <div class="max-w-md w-full">
                        <a href="javascript:void(0)"><img
                          src="Images/logo/skillPro logo.jpg" alt="logo" class='w-40 mb-8 mx-auto block rounded-full' />
                        </a>
              
                        <div class="p-8 rounded-2xl bg-white shadow">
                          <h2 class="text-gray-800 text-center text-2xl font-bold">Sign in</h2>
                          <form class="mt-8 space-y-4">
                            <div>
                              <label class="text-gray-800 text-sm mb-2 block">User name</label>
                              <div class="relative flex items-center">
                                <input name="username" type="text" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter user name" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                  <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                  <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                                </svg>
                              </div>
                            </div>
              
                            <div>
                              <label class="text-gray-800 text-sm mb-2 block">Password</label>
                              <div class="relative flex items-center">
                                <input name="password" type="password" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter password" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                  <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                                </svg>
                              </div>
                            </div>
              
                            <div class="flex flex-wrap items-center justify-between gap-4">
                              <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                                  Remember me
                                </label>
                              </div>
                              <div class="text-sm">
                                <a href="jajvascript:void(0);" class="text-blue-600 hover:underline font-semibold">
                                  Forgot your password?
                                </a>
                              </div>
                            </div>
              
                            <div class="!mt-8">
                              <button type="button" class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                                Sign in
                              </button>
                            </div>
                            <p class="text-gray-800 text-sm !mt-8 text-center">Don't have an account? <a href="Register.php" class="text-blue-600 hover:underline ml-1 whitespace-nowrap font-semibold">Register here</a></p>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-action">
                    <form method="dialog">
                      <!-- if there is a button in form, it will close the modal -->
                      <button class="btn">Close</button>
                    </form>
                  </div>
                </div>
              </dialog>
            </div>
          </div>
          <div class="md:w-1/2 mt-10 md:mt-0">
            <img
              src="Images/learning from online.jpg"
              alt="E-learning"
              class="w-full rounded-md shadow-lg"
            />
          </div>
        </div>
      </section>

      <!-- All Development Courses Title -->
      <section id="development" class="text-center m-10 text-mainColor">
        <h2 class=" text-5xl font-extrabold">All Development Courses</h2>
      </section>

      <!--  All Devlopment Courses-->
      <section>
        <div class="carousel w-full bg-slate-800 py-16">
          <div id="slide1" class="carousel-item relative w-full">
            <!-- card  -->
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto highlight">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <figure>
                    <img
                      src="Images/Courses Images/Web devlopment.jpg"
                      alt="web development"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title ">Web Development</h2>
                    <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="Images/Courses Images/man-using-tablet-work-connect-with-others.jpg"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Data Science</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://media.istockphoto.com/id/1370433251/photo/black-woman-sitting-at-desk-using-computer-writing-in-notebook.jpg?s=612x612&w=0&k=20&c=rHpy3cX4LVFtzLI4gyy0T-fNYdTeAcdNQgTmy9maAIA="
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Full-Stack Web Development: From Basics to Advanced</h2>
                    <p>Learn to build dynamic, responsive websites and master both frontend and backend web development in this hands-on course.</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary"><a href="login.php">Buy Now</a></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide4" class="btn btn-circle">❮</a>
              <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide2" class="carousel-item relative w-full">
            <!-- card  -->
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto highlight">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide1" class="btn btn-circle">❮</a>
              <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide3" class="carousel-item relative w-full">
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide2" class="btn btn-circle">❮</a>
              <a href="#slide4" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide4" class="carousel-item relative w-full">
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide3" class="btn btn-circle">❮</a>
              <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
          </div>
        </div>
      </section>


      <!-- All It & Software Courses Title -->
      <section class="text-center m-10 text-mainColor">
        <h2 id="Software" class=" text-5xl font-extrabold">All It & Software Courses</h2>
      </section>

      <!--  All It & Software Courses Courses-->
      <section>
        <div class="carousel w-full bg-slate-800 py-16">
          <div id="slide1" class="carousel-item relative w-full">
            <!-- card  -->
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto highlight">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <figure>
                    <img
                      src="https://imageio.forbes.com/specials-images/imageserve/66827d52a65f2b36f9c14f28/Backend-software-developer---flat-design/960x0.jpg?format=jpg&width=960"
                      alt="web development"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title "> Mastering Python Programming for Beginners</h2>
                    <p>"Learn the fundamentals of Python programming through hands-on projects and real-world applications."</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary"><a href="login.php">Buy Now</a></button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://media.licdn.com/dms/image/D5612AQHBD3-lkkqctw/article-cover_image-shrink_720_1280/0/1698037164358?e=2147483647&v=beta&t=wnGTqWJX4Yq0P0JsmpcO2aI5vpzvCUQm_00bJKhNFLs"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Cloud Computing Essentials with AWS</h2>
                    <p>Understand cloud computing principles and gain practical skills in AWS for deploying and managing applications</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary"><a href="login.php">Buy Now</a></button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://miro.medium.com/v2/resize:fit:1400/0*02gGOEknrm2g_GAD.jpg"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Cybersecurity Foundations: Protecting Digital Assets</h2>
                    <p>Explore core cybersecurity concepts and techniques to protect digital assets from potential threats</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary"><a href="login.php">Buy Now</a></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide4" class="btn btn-circle">❮</a>
              <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide2" class="carousel-item relative w-full">
            <!-- card  -->
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto highlight">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide1" class="btn btn-circle">❮</a>
              <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide3" class="carousel-item relative w-full">
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide2" class="btn btn-circle">❮</a>
              <a href="#slide4" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide4" class="carousel-item relative w-full">
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide3" class="btn btn-circle">❮</a>
              <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
          </div>
        </div>
      </section>



       <!-- All Design Courses Title -->
       <section class="text-center m-10 text-mainColor">
        <h2 id="Design" class=" text-5xl font-extrabold">All Design Courses</h2>
      </section>

      <!--  All Design Courses Courses-->
      <section>
        <div class="carousel w-full bg-slate-800 py-16">
          <div id="slide1" class="carousel-item relative w-full">
            <!-- card  -->
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto highlight">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <figure>
                    <img
                      src="https://www.mindinventory.com/blog/wp-content/uploads/2023/11/difference-between-ui-ux.webp"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title ">UI/UX Design Fundamentals</h2>
                    <p>Learn the principles of user interface and user experience design to create intuitive and engaging digital products</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary"><a href="login.php">Buy Now</a></button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://i.ytimg.com/vi/Ob9RsJRvJek/sddefault.jpg"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Advanced Graphic Design with Adobe Creative Suite</h2>
                    <p>Master Adobe tools like Photoshop, Illustrator, and InDesign to create professional-grade visual designs</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary"><a href="login.php"></a>Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://i.ytimg.com/vi/i0oWkRv4S78/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAA9fQ6YZtW4ugULzQYyZXybDP9Aw"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">esponsive Web Design with HTML and CSS</h2>
                    <p>Gain expertise in designing flexible, mobile-friendly websites using HTML5, CSS3, and modern layout techniques.</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary"><a href="login.php"></a>Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide4" class="btn btn-circle">❮</a>
              <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide2" class="carousel-item relative w-full">
            <!-- card  -->
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto highlight">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide1" class="btn btn-circle">❮</a>
              <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide3" class="carousel-item relative w-full">
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide2" class="btn btn-circle">❮</a>
              <a href="#slide4" class="btn btn-circle">❯</a>
            </div>
          </div>
          <div id="slide4" class="carousel-item relative w-full">
            <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
              <!-- card-1 -->
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-2 -->
              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- card-3 -->

              <div>
                <div class="card bg-base-100 w-96 shadow-xl highlight">
                  <figure>
                    <img
                      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                      alt="Shoes"
                    />
                  </figure>
                  <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                      <button class="btn btn-primary">Buy Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
            >
              <a href="#slide3" class="btn btn-circle">❮</a>
              <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
          </div>
        </div>
      </section>


     <!-- Watch Free Webinar title and description Section -->
<section class="text-center m-10 ">
  <h2 class="text-5xl font-extrabold">Watch Free Webinar</h2>
  <p class="font-extralight mt-2">Discover everything you gain by joining our live course.</p>
</section>
<!-- Watch Free Webinar Section -->

<section class="bg-slate-800 lg:p-10">
  <div class="grid lg:grid-cols-3 gap-4">

    <!-- card-1 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://marketplace.canva.com/EAE_V_x3FgA/1/0/1600w/canva-live-webinar-instagram-post-Iofdxu_-4ZQ.jpg" alt="Webinar" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">UI/UX Design Webinar</h2>
          <p>Join our free webinar to learn the basics of UI/UX design and how it impacts user experience.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-2 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://marketplace.canva.com/EAF1cBj-8l8/1/0/1600w/canva-blue-modern-online-webinar-instagram-post-P3Ui26vGrZU.jpg" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Web Development Fundamentals</h2>
          <p>Learn the essentials of web development, from HTML to JavaScript, in this free webinar.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-3 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://i0.wp.com/orangevfx.com/wp-content/uploads/2023/03/March-Free-Webinar-Seminar-2023-Orange-VFX-3D-Game-Unreal-Engine-Seminar-Training-Online.jpg?fit=1551%2C1549&ssl=1" alt="Webinar" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Introduction to Cybersecurity</h2>
          <p>Explore the world of cybersecurity in this free webinar and learn key strategies for protecting digital assets.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-4 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjEE8q0FEjGyuE730YBogvhMjazZ_hDDUzuPFLE5l88UFV5FEs41sQp5jtOr6KWqGRi9s&usqp=CAU" alt="Webinar" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Advanced JavaScript Techniques</h2>
          <p>Master advanced JavaScript concepts and improve your coding skills with this in-depth webinar.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-5 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://img.freepik.com/premium-psd/digital-marketing-webinar-social-media-post-template_539910-278.jpg" alt="Webinar" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Cloud Computing Essentials</h2>
          <p>Get started with cloud computing and understand the fundamentals of cloud infrastructure and services.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-6 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://i.pinimg.com/736x/55/41/b8/5541b8bb6ae4cf90fa33fb3388427842.jpg" alt="Webinar" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Responsive Web Design</h2>
          <p>Learn how to create websites that adapt seamlessly to different screen sizes in this free webinar.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-7 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://store.taproot.com/images/thumbs/0001404_free-webinar-most-used-least-effective-cas_550.png" alt="Webinar" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Introduction to Python</h2>
          <p>Join us to learn the basics of Python programming and how to build simple applications.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-8 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://digital.excelacademy.my/wp-content/uploads/2023/03/Webinar-AI-Powered-Social-Media-Marketing-24-March-web.png" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Building Scalable APIs</h2>
          <p>Learn how to design and build scalable APIs with modern frameworks and technologies.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- card-9 -->
    <div>
      <div class="card card-side bg-base-100 shadow-xl highlight">
        <figure>
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7mNCg2N-3ZqEzb-2S6TpNOCgvsrDNTJHGsGhHd2U_bzVdjl6_IqFJ8A1U7qYN_iddQCY&usqp=CAU" alt="Webinar" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Mastering React.js</h2>
          <p>Gain a deep understanding of React.js and learn how to build modern, interactive web applications.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Watch</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Set Career Goal and description Section -->
<section class="text-center m-10 ">
  <h2 class="text-5xl font-extrabold">Set Career Goal</h2>
  <p class="font-extralight mt-2">Select your Career Goal from The Options and start learning</p>
</section>


      <!-- Set Career Goal section -->

      <section class="bg-slate-800  p-10 grid justify-center">
        <div class="lg:flex gap-6">

          <!-- card-1 -->

          <div>
            <a href="#development">
              <div class="card bg-base-100 lg:w-96 shadow-xl highlight">
                <div class="card-body text-center">
                  <img src="Icons/developer.png" alt="" class="w-1/4 mx-auto">
                  <h5 class=" text-xl font-semibold mt-4 text-center">Development</h5>
                  <div>
                    <ul class="list-disc flex justify-center gap-10 mt-4">
                      <li>30 Courses</li>
                      <li>5 workshops</li>
                    </ul>
                  </div>
                </div>
              </div>
            </a>

          </div>

          <!-- card-2 -->

          <div>

            <a href="#Software">
              <div class="card bg-base-100 lg:w-96 shadow-xl highlight">
                <div class="card-body text-center">
                  <img src="Icons/software-development.png" alt="" class="w-1/4 mx-auto">
                  <h5 class=" text-xl font-semibold mt-4 text-center">It & Software</h5>
                  <div>
                    <ul class="list-disc flex justify-center gap-10 mt-4">
                      <li>12 Courses</li>
                      <li>4 workshops</li>
                    </ul>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <!-- card-3 -->

          <div>
            <a href="#Design">
              <div class="card bg-base-100 lg:w-96 shadow-xl highlight">
                <div class="card-body text-center">
                  <img src="Icons/design-thinking.png" alt="" class="w-1/4 mx-auto">
                  <h5 class=" text-xl font-semibold mt-4 text-center">Design</h5>
                  <div>
                    <ul class="list-disc flex justify-center gap-10 mt-4">
                      <li>8 Courses</li>
                      <li>3 workshops</li>
                    </ul>
                  </div>
                </div>
              </div>
            </a>
          </div>



        </div>
        
      </section>



      <!-- Live Course Contents title and description -->

      <section class="text-center m-10 ">
        <h2 class=" text-5xl font-extrabold">Live Course Contents</h2>
      <p class="font-extralight mt-2">See what you are getting after joining our live courses</p>
      </section>

      <!-- Live Course Contents -->

      <section class="bg-slate-800 lg:p-14 p-5">
        <!-- continer-3 -->
        <div class="flex lg:flex-row flex-col justify-center items-center text-center gap-1 m-1 ">
          <div class="flex flex-col items-center text-center p-6 bg-gray-200 rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/video-marketing.png" alt="">
            <h3 class="card-h3">Industry Focused Live Courses</h3>
            <p class="card-p">Join our guideline based & industry focused live courses, start your career journey.</p>
          </div>
        
          <div class="flex flex-col items-center text-center p-6 bg-gray-200  rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/live.png" alt="">
            <h3 class="card-h3">Interactive Live Class</h3>
            <p class="card-p">Skill development with industry experts through live, conceptual, and support classes.</p>
          </div>
        
          <div class="flex flex-col items-center text-center p-6 bg-gray-200 rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/cubes.png" alt="">
            <h3 class="card-h3">Module Based Study Plan</h3>
            <p class="card-p">Stay on track with a module-based study plan featuring quizzes, assignments, and live tests.</p>
          </div>
        </div>


         <!-- continer-2 -->
         <div class="flex lg:flex-row flex-col justify-center items-center text-center gap-1 m-1 ">
          <div class="flex flex-col items-center text-center p-6 bg-gray-200 rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/video-marketing.png" alt="">
            <h3 class="card-h3">Industry Focused Live Courses</h3>
            <p class="card-p">Join our guideline based & industry focused live courses, start your career journey.</p>
          </div>
        
          <div class="flex flex-col items-center text-center p-6 bg-gray-200  rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/video-marketing.png" alt="">
            <h3 class="card-h3">Industry Focused Live Courses</h3>
            <p class="card-p">Join our guideline based & industry focused live courses, start your career journey.</p>
          </div>
        
          <div class="flex flex-col items-center text-center p-6 bg-gray-200 rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/video-marketing.png" alt="">
            <h3 class="card-h3">Industry Focused Live Courses</h3>
            <p class="card-p">Join our guideline based & industry focused live courses, start your career journey.</p>
          </div>
        </div>


         <!-- continer-1 -->
         <div class="flex lg:flex-row flex-col justify-center items-center text-center gap-1 m-1">
          <div class="flex flex-col items-center text-center p-6 bg-gray-200 rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/video-marketing.png" alt="">
            <h3 class="card-h3">Industry Focused Live Courses</h3>
            <p class="card-p">Join our guideline based & industry focused live courses, start your career journey.</p>
          </div>
        
          <div class="flex flex-col items-center text-center p-6 bg-gray-200  rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/video-marketing.png" alt="">
            <h3 class="card-h3">Industry Focused Live Courses</h3>
            <p class="card-p">Join our guideline based & industry focused live courses, start your career journey.</p>
          </div>
        
          <div class="flex flex-col items-center text-center p-6 bg-gray-200 rounded-lg shadow-md">
            <img class="w-1/12" src="Icons/video-marketing.png" alt="">
            <h3 class="card-h3">Industry Focused Live Courses</h3>
            <p class="card-p">Join our guideline based & industry focused live courses, start your career journey.</p>
          </div>
        </div>
        


      </section>



         <!-- Explore your coding knowledge with Skill Pro and Assess skills with Skillable Skillable & get free certificate section -->

    <section class="bg-slate-800 lg:mt-10 lg:p-20">

      <div class=" flex lg:flex-row flex-col lg:gap-16 "> 
        
        <!-- card-1 -->
        <div>
          <div class="card bg-base-100 w-full shadow-xl">
            <div class="card-body">
              <h2 class="card-title">Explore your coding knowledge with Skill Pro</h2>
              <button class="btn btn-active btn-primary w-40 mt-1 text-black font-bold">CHECK <img class="w-9" src="Icons/RIGHT-ARROW.png" alt=""></button>
            </div>
            <figure>
              <img
                src="https://images.stockcake.com/public/2/5/2/2528afc3-9429-470b-8a32-edea706aafc9_large/focused-computer-programmer-stockcake.jpg" />
            </figure>
          </div>

        </div>

        <!-- card-2 -->
        <div>
          <div class="card bg-base-100 w-full shadow-xl">
            <div class="card-body">
              <h2 class="card-title">Assess skills with Skillable Skillable & get free certificate</h2>
              <button class="btn btn-active btn-primary w-40 mt-1 text-black font-bold">CHECK <img class="w-9" src="Icons/RIGHT-ARROW.png" alt=""></button>
            </div>
            <figure>
              <img
                src="https://t3.ftcdn.net/jpg/08/71/02/34/360_F_871023459_qw2fo1BlgBk45aKC0N9Ll558qexg1nSm.jpg"
                alt="Shoes" />
            </figure>
          </div>

        </div>

      </div>


    </section>


      <!-- SkillPro for business Section -->
 
      <section class="bg-slate-800 p-10 mt-9" >
        <div class="flex flex-col md:flex-row bg-gray-50 rounded-lg p-6 shadow-lg">
          <!-- Left Content -->
          <div class="md:w-1/2 p-4 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">SkillPro for business</h2>
            <p class="text-gray-600 mb-6">Join our Corporate Skills Training Program, get training from the country's best industry experts and reinvent your team.</p>
            <button class="bg-yellow-400 text-white font-semibold py-2 px-4 rounded hover:bg-yellow-500 focus:outline-none">
              SEE DETAILS &rarr;
            </button>
            <h3 class="mt-8 text-xl font-semibold text-gray-800">Some of our clients</h3>
            <div class="flex space-x-4 mt-4">
              <!-- Client logos -->
              <img src="Images/logo/ibm.png" alt="Client 1" class="h-8">
              <img src="Images/logo/penn.png" alt="Client 2" class="h-8">
              <img src="Images/logo/Machigan.png" alt="Client 3" class="h-8">
              <img src="Images/logo/google.png" alt="Client 4" class="h-8">
            </div>
          </div>
          
          <!-- Right Content (Image) -->
          <div class="md:w-1/2 mt-6 md:mt-0 flex justify-center">
            <img src="Images/eng.png" alt="Training Session" class="rounded-lg w-full md:w-3/4">
          </div>
        </div>
        
      </section>


        <!-- success rate card -->

     <section class="bg-slate-800 lg:mt-10  lg:p-10 grid justify-center">
      <div class="lg:flex lg:flex-row justify-center items-center gap-6 stat-container">

        <!-- card-1 -->

        <div class="stat-card" style="background-color: #d4f8e8;">
          <div class="stat-card-title">7000+</div>
          <div class="stat-card-description">Job Placement</div>
        </div>

        <!-- card-2 -->

        <div class="stat-card" style="background-color: #dce7fc;">
          <div class="stat-card-title">15,000+</div>
          <div class="stat-card-description">Learner</div>
        </div>
        

        <!-- card-3 -->

        <div class="stat-card w-auto" style="background-color: #ffe3d3;">
          <div class="stat-card-title">90%</div>
          <div class="stat-card-description">Course Completion Rate</div>
        </div>

        <!-- card-4 -->

        <div class="stat-card" style="background-color: #fff2cc;">
          <div class="stat-card-title">46</div>
          <div class="stat-card-description">Live Course</div>
        </div>




      </div>
      
    </section>




      <!-- Learner Reviews title and description sections -->

 <section class="text-center m-10 ">
        <h2 class=" text-5xl font-extrabold">Learner Reviews</h2>
      <p class="font-extralight mt-2">See what our learners are saying</p>
      </section>


      <!-- Learner Reviews cards sections -->

     <section class="bg-slate-800 py-6">
     <div class="carousel w-full">
        <div id="item1" class="carousel-item w-full">
          <div class="flex">
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
    
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
    
    
    
          </div>
        </div>
        <div id="item2" class="carousel-item w-full">
          <div class="flex">
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
    
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
     </div>
        </div>
        <div id="item3" class="carousel-item w-full">
          <div class="flex">
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
    
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
    
    
    
          </div>
        </div>
        <div id="item4" class="carousel-item w-full">
          <div class="flex">
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
    
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
            <div>
              <a href="javascript:void(0)">
                <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                  <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80" alt="card-image" />
                  </div>
                  <div class="p-4">
                    <div class="mb-4 rounded-full bg-cyan-600 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
                      POPULAR
                    </div>
                    <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                      Website Review Check
                    </h6>
                    <p class="text-slate-600 leading-normal font-light">
                      The place is close to Barceloneta Beach and bus stop just 2 min by walk
                      and near to &quot;Naviglio&quot; where you can enjoy the main night life in
                      Barcelona.
                    </p>
                  </div>
               
                  <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                      <img
                        alt="Tania Andrew"
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                        class="relative inline-block h-8 w-8 rounded-full"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Lewis Daniel</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
                </div> 
              </a>
            </div>
    
    
    
    
          </div>
        </div>
      </div>
      <div class="flex w-full justify-center gap-2 py-2">
        <a href="#item1" class="btn btn-xs">1</a>
        <a href="#item2" class="btn btn-xs">2</a>
        <a href="#item3" class="btn btn-xs">3</a>
        <a href="#item4" class="btn btn-xs">4</a>
      </div>
     </section>




   


    <!-- Free Courses title and buttton  section-->
    <section class="text-center m-10 ">
      <h2 class=" text-5xl font-extrabold mb-4">Free Courses</h2>
      <a href="FreeCourses.html"><button class="btn btn-outline btn-success">SEE ALL</button></a>
    </section>

    <!-- Free Courses section-->
    <section>
      <div class="carousel w-full bg-slate-800 py-16">
        <div id="slide1" class="carousel-item relative w-full">
          <!-- card  -->
          <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
            <!-- card-1 -->
            <div class="flex-auto">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>

            <!-- card-2 -->
            <div class="flex-auto">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>

            <!-- card-3 -->

            <div class="flex-auto ">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>
          </div>
          
          <div
            class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
          >
            <a href="#slide4" class="btn btn-circle">❮</a>
            <a href="#slide2" class="btn btn-circle">❯</a>
          </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
          <!-- card  -->
          <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
            <!-- card-1 -->
            <div class="flex-auto ">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>

            <!-- card-2 -->
            <div class="flex-auto ">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>

            <!-- card-3 -->

            <div>
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <video class="h-full w-full rounded-lg" controls>
                    <source
                      src="https://docs.material-tailwind.com/demo.mp4"
                      type="video/mp4"
                    />
                    Your browser does not support the video tag.
                  </video>
                  <div class="card-body">
                    <h2 class="card-title ">Web Development</h2>
                    <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
          >
            <a href="#slide1" class="btn btn-circle">❮</a>
            <a href="#slide3" class="btn btn-circle">❯</a>
          </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
          <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
            <!-- card-1 -->
            <div class="flex-auto ">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>

            <!-- card-2 -->
            <div class="flex-auto">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>

            <!-- card-3 -->

            <div class="flex-auto">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>
          </div>
          <div
            class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
          >
            <a href="#slide2" class="btn btn-circle">❮</a>
            <a href="#slide4" class="btn btn-circle">❯</a>
          </div>
        </div>
        <div id="slide4" class="carousel-item relative w-full">
          <div class="lg:flex gap-10 justify-center items-center lg:ml-32">
            <!-- card-1 -->
            <div class="flex-auto">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>

            <!-- card-2 -->
            <div>
              <div class="flex-auto">
                <div class="card bg-base-100 w-96 shadow-xl">
                  <video class="h-full w-full rounded-lg" controls>
                    <source
                      src="https://docs.material-tailwind.com/demo.mp4"
                      type="video/mp4"
                    />
                    Your browser does not support the video tag.
                  </video>
                  <div class="card-body">
                    <h2 class="card-title ">Web Development</h2>
                    <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- card-3 -->

            <div class="flex-auto">
              <div class="card bg-base-100 w-96 shadow-xl">
                <video class="h-full w-full rounded-lg" controls>
                  <source
                    src="https://docs.material-tailwind.com/demo.mp4"
                    type="video/mp4"
                  />
                  Your browser does not support the video tag.
                </video>
                <div class="card-body">
                  <h2 class="card-title ">Web Development</h2>
                  <p>Learn web development with MERN, PHP, Laravel, and Django—all in one place</p>
                  
                </div>
              </div>
            </div>
          </div>
          <div
            class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between"
          >
            <a href="#slide3" class="btn btn-circle">❮</a>
            <a href="#slide1" class="btn btn-circle">❯</a>
          </div>
        </div>
      </div>
    </section>
  
  </main>

   <?php
   include('footer.php')
   
   
   ?>
  
 
  </body>
</html>

