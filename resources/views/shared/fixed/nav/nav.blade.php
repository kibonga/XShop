<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="#">
            {{env('APP_NAME')}}
        </a>

        {{--  Mobile nav button--}}

        {{--  Mobile nav button--}}

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


            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                @include('shared.utils.search')
                @include('shared.utils.cart')
                @include('shared.utils.profile')
            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->
