@auth
    <ul class="flex space-x-6 mr-6 text-lg">
            <span>
                <i class="font-bold uppercase">Welcome {{auth()->user()->name}}</i>
             </span>
        </li>
        <li>
            <a href="{{route("managelists")}}" class="hover:text-laravel"
            ><i class="fa-solid fa-gear"></i>
                Manage listing</a
            >
        </li>
        <li>
            <form class="inline" action="{{route('logout')}}" method="post">
                <button type="submit">
                    @csrf
                    <i class="fa-solid fa-door-closed">Logout</i>
                </button>
            </form>
        </li>
    </ul>
@else
    <ul class="flex space-x-6 mr-6 text-lg">
        <li>
            <a href="/register" class="hover:text-laravel"
            ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>
        <li>
            <a href="/login" class="hover:text-laravel"
            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
    </ul>
@endauth
