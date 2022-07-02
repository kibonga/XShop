<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{route('home.home')}}">{{env('APP_NAME')}}</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
{{--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
    @auth
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                @if(Auth::user()->isAdmin())
                    {{--Logout--}}
                    <a href="{{route('logout')}}" id="prevent-logout" class="btn btn-outline-light me-2"
                     onclick="event.preventDefault();document.querySelector('#logout-form').submit()"
                    >Logout</a>
                    <form action="{{route('logout')}}" method="POST" style="display: none" id="logout-form">
                        @csrf
                        <input type="hidden" id="hidden" name="hidden" value="">
                    </form>
                    {{--Logout--}}
                @endif
            </div>
        </div>
    @endauth
</header>
