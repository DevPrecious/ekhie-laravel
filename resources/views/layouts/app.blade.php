<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ekhie</title>
    <!--bootstrap cdn links-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5ddb92922b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/event.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/buyticket.css') }}" />
    <!--trying owl carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body>

    <!--navbar and side menu-->
    <header>
        <nav>
            <a href="index.html" class="title">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>
            <div class="theNav">
                <ul>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="{{ route('shop') }}">Shop</a>
                      </li>
                    @if (Route::has('login'))
                    @auth
                    @if(Auth::user()->is_admin == '1')
                    <li>
                        <a href="{{ route('admin.home') }}">Admin</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    @endif
                    @else
                    <li>
                        <a href="{{ route('register') }}">Signup</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                    @endif
                    @auth
                    <button class="btn btn-default create-event">Create Event</button>
                    {{-- <form action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-default create-event" type="submit">Logout</button>
                    </form> --}}
                    @endauth
                </ul>
            </div>
            <div class="menu-icon">
                <i class="fas fa-bars" onclick="showSidebar()"></i>
            </div>
        </nav>
        </div>
        <!-- The side bar starts here -->
        <div class="nav-menu">
            <div class="closeIcon">
                <i class="fas fa-times" onclick="closeSidebar()"></i>
            </div>
            <div class="sidenav">
                <ul>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="signup.html">Signup</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <button class="btn btn-default create-event2">Create Event</button>
                </ul>
            </div>
        </div>
    </header>
    <!--header ends here-->

    @yield('content')


    <footer class="text-center bg-dark text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
            </section>
            <!-- Section: Social media -->
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://ekhie.com/">Ekhie.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer ends here -->


    <!--trying carousel js imports-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let sidemenu = document.querySelector('.nav-menu')

        function closeSidebar() {
            sidemenu.style.left = "-100%"
        }

        function showSidebar() {
            sidemenu.style.left = "0"
        }

        //trying carousel jquery
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 4000,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                460: {
                    items: 2
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
            },
        })
    </script>
    @livewireScripts
</body>

</html>