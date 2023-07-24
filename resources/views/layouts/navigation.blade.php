 {{-- Top Navbar Component 
    ================================================
    Coded By Swapin vidya 2024
    This includes in 
        1, layouts singlepage blade
        2, guest blade
    Tailwind CSS 
    ================================================ --}}
 <!-- Top Bar Nav -->
 <nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                <li><a class="hover:text-gray-200 hover:underline px-4" href="/">Home</a></li>
                @auth
                <li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a type="submit" class="hover:text-gray-200 hover:underline px-4" 
                    href="{{route('logout')}}"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();"
                    >Logout
                    </a>
                    </form>
                </li>
               
                @else

                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('login') }}">Login</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('register') }}">Register</a></li>

                @endauth

            </ul>
        </nav>

        <div class="flex items-center text-lg no-underline text-white pr-6">
            <a class="" href="#">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
</nav>

