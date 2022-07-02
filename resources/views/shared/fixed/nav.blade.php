<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    {{--    Nav container--}}
    <div class="container d-flex justify-content-between align-items-center">

        {{--Logo--}}
        <a class="navbar-brand text-success logo h1 align-self-center" href="{{route('home.home')}}">
            {{env('APP_NAME')}}
        </a>
        {{--Logo--}}

        {{--Mobile nav button--}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--Mobile nav button--}}

        {{--Nav wrapper--}}
        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
             id="templatemo_main_nav">

            {{-- Nav --}}
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    {{--                    @include('shared.fixed.nav._nav')--}}
                    @foreach($navs as $nav)
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteNamed($nav['route']) ? 'active bg-light' : '' }}" href="{{ route($nav['route']) }}">{{$nav['name']}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- Nav --}}

            {{--Nav utils--}}
            <div class="navbar align-self-center d-flex">
                @auth
                    {{-- Cart --}}
                    <div>
                        <a class="nav-icon position-relative text-decoration-none" href="{{route('cart.index')}}">
                            <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                            <span
                                class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"
                                id="cart-quantity"></span>
                        </a>
                    </div>
                    {{-- Cart --}}
                    {{--Dashboard--}}
                    @if(Auth::user()->isAdmin())
                        <div>
                            <a class="nav-icon position-relative text-decoration-none" href="{{route('admin.index')}}">
                                <i class="fa fa-1x fa-chart-line"></i>
                                <span
                                    class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"
                                    id="dashboard"></span>
                            </a>
                        </div>
                    @endif
                    {{--Dashboard--}}
                @endauth


                {{--                Profile--}}
                {{--                <div>--}}
                {{--                    <a class="nav-icon position-relative text-decoration-none" href="#">--}}
                {{--                        <i class="fa fa-fw fa-user text-dark mr-3"></i>--}}
                {{--                        <span--}}
                {{--                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>--}}
                {{--                        <button id="delete-storage">Delete storage</button>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                Profile--}}


            </div>
            {{--Nav utils--}}


            {{--Auth--}}
            <div class="mx-3 text-end">
                @guest
                    {{--Login--}}
                    <a href="{{route('login')}}" class="btn btn-primary me-2 text-white">Login</a>
                    @if(Route::has('register'))
                        <a href="{{route('register')}}" class="btn btn-primary text-white">Register</a>
                    @endif
                    {{--Login--}}
                @else
                    {{--Logout--}}
                    <a href="{{route('logout')}}" id="prevent-logout" class="btn btn-outline-primary me-2"
                        {{--                       onclick="event.preventDefault();document.querySelector('#logout-form').submit()"--}}
                    >Logout</a>
                    <form action="{{route('logout')}}" method="POST" style="display: none" id="logout-form">
                        @csrf
                        <input type="hidden" id="hidden" name="hidden" value="">
                    </form>
                    {{--Logout--}}
                @endguest
            </div>
            {{--Auth--}}

        </div>
        {{--Nav wrapper--}}
    </div>
    {{--    Nav container--}}
</nav>
<!-- Close Header -->
