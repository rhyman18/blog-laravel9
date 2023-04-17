<header>
    <nav class="flex flex-col sm:flex-row sm:items-end bg-ungu py-4 px-9 sm:justify-start justify-between">
        <h1 class="text-3xl font-bold text-pudar text-center">Blog Apps</h1>
        <div class="sm:ms-6 mt-4 sm:mt-0 text-center text-xl text-pudar font-medium">
            <a href="{{ url('/') }}" class="px-3 {{ ($judul == 'Blog List') ? 'text-hitampudar' : '' }} hover:text-hitampudar">Home</a>
            @if (Auth::check())
            <a href="{{ url('logout') }}" class="px-3 hover:text-hitampudar">Logout</a>
            @else
            <a href="{{ ($judul == 'Login') ? '#' : url('login') }}" class="px-3 {{ ($judul == 'Login') ? 'text-hitampudar' : '' }} hover:text-hitampudar">Login</a>
            <a href="{{ ($judul == 'Register') ? '#' : url('register') }}" class="px-3 {{ ($judul == 'Register') ? 'text-hitampudar' : '' }} hover:text-hitampudar">Register</a>
            @endif
        </div>
    </nav>
</header>