<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>Laravel</title>

</head>

<body class="antialiased">


    <nav class="p-3 border-gray-200 rounded bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="#" class="flex items-center">
                <img src={{ asset('images/5.png') }} class="h-6 mr-3 sm:h-10" alt="coffe shop" />
                <span class="self-center text-xl font-semibold whitespace-nowrap  dark:text-white">coffe shop</span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul
                    class="flex flex-col mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">

                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <li>
                                    <a href="{{ url('/dashboard') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    </li>
                                @endif
                            @endauth
                        </div>
                    @endif


                </ul>
            </div>
        </div>
    </nav>














    <div class="py-20" style="background: linear-gradient(90deg, #585858 0%, #6d6873 100%)">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-2 text-white">
                coffe shop
            </h2>
            <h3 class="text-2xl mb-8 text-gray-200">
                the best coffe shop on the world
            </h3>
            <button class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider">
                See all the products
            </button>
        </div>
    </div>

    <section class="container mx-auto px-6 ">
        <h2 class="text-4xl font-bold text-center ">
            best menu
        </h2>
        <div class="flex items-center flex-wrap ">
            <div class="w-full md:w-1/2">
                <h4 class="text-3xl text-gray-800 font-bold ">
                    Choose your menu
                </h4>
                <p class="text-gray-600 mb-8">
                    best offer
                </p>
            </div>
            <div class="w-full ">
                <section class=" h-3/5">
                    <div class="carousel rounded-box h-96">
                        <div class="carousel-item w-full ">
                            <img src={{ asset('images\1.jpg') }} class="w-full " />
                        </div>
                        <div class="carousel-item w-full ">
                            <img src={{ asset('images\2.jpg') }} class="w-full" />
                        </div>
                        <div class="carousel-item w-full ">
                            <img src={{ asset('images\3.jpg') }} class="w-full" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src={{ asset('images\5.png') }} class="w-full" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src={{ asset('images\6.jpg') }} class="w-full" />
                        </div>

                        <div class="carousel-item w-full">
                            <img src={{ asset('images\1.jpg') }} class="w-full" />
                        </div>
                    </div>
                </section>
            </div>
        </div>




        <div class="flex items-center flex-wrap mb-20">
            <div class="w-full md:w-1/2">
                <section>
                    <div class="w-64 carousel rounded-box h-80">
                        <div class="carousel-item w-full">
                            <img src="{{ asset('images\coffee-5176961_1920.jpg') }} class="w-full" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src="{{ asset('images\coffee-5176961_1920.jpg') }} class="w-full"
                                alt="Tailwind CSS Carousel component" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src="{{ asset('images\coffee-5176961_1920.jpg') }}  class="w-full"
                                alt="Tailwind CSS Carousel component" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src="{{ asset('assets/images/image.png') }} class="w-full"
                                alt="Tailwind CSS Carousel component" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src="{{ asset('assets/images/image.png') }} class="w-full"
                                alt="Tailwind CSS Carousel component" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src="{{ asset('assets/images/image.png') }} class="w-full"
                                alt="Tailwind CSS Carousel component" />
                        </div>
                        <div class="carousel-item w-full">
                            <img src="{{ asset('assets/images/image.png') }} class="w-full"
                                alt="Tailwind CSS Carousel component" />
                        </div>
                    </div>
                </section>
            </div>

        </div>

    </section>






</body>

</html>
