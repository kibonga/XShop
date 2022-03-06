<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    {{--    Nav container--}}
    <div class="container d-flex justify-content-between align-items-center">

        {{-- Logo --}}
        @include('shared.fixed.nav.logo')
        {{-- Logo --}}

        {{--  Mobile nav button--}}
        @include('shared.fixed.nav.mobile-button')
        {{--  Mobile nav button--}}

        {{--Nav wrapper--}}
        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
             id="templatemo_main_nav">

            {{-- Nav --}}
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    @foreach($navs as $nav)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route($nav->route) }}">{{$nav->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- Nav --}}

            {{--Nav utils--}}
            <div class="navbar align-self-center d-flex">
                @include('shared.fixed.nav.search')
                @include('shared.fixed.nav.cart')
                @include('shared.fixed.nav.profile')
            </div>
            {{--Nav utils--}}

        </div>
        {{--Nav wrapper--}}
    </div>
    {{--    Nav container--}}
</nav>
<!-- Close Header -->
