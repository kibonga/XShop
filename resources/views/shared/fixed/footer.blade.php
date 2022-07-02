<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            {{-- Contact info--}}
            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    @foreach($contactInfo as $contact)
                        <li>
                            <i class="fas {{$contact['icon']}} fa-fw"></i>
                            {{$contact['value']}}
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- Contact info--}}

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Luxury</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                    <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                    <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                    <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                    <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>
                </ul>
            </div>

            {{--  Footer nav--}}
            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    {{-- Nav --}}
                    <div class="flex-fill">
                        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                            {{--                    @include('shared.fixed.nav._nav')--}}
                            @foreach($navs as $nav)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route($nav['route']) }}">{{$nav['name']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Nav --}}
                </ul>
            </div>
            {{--  Footer nav--}}

        </div>

        <div class="row text-light mb-4">

            {{--Divider--}}
            @include('shared.utils.divider')
            {{--Divider--}}

            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">

                    {{-- Footer Social Networks--}}
                    @foreach($socialInfo as $social)
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="{{$social['link']}}"><i
                                    class="fab {{$social['icon']}} fa-lg fa-fw"></i></a>
                        </li>
                    @endforeach
                    {{-- Footer Social Networks--}}

                </ul>
            </div>

            {{--Footer subscription--}}
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"
                           placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
            {{--Footer subscription--}}

        </div>
    </div>

    {{--Copyright--}}
    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; {{\Carbon\Carbon::now()->year}} {{env('APP_NAME')}}
                        | Designed by <a rel="sponsored" href="{{env('AUTHOR_PORTFOLIO')}}"
                                         target="_blank">{{env('AUTHOR_NAME')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{--Copyright--}}

</footer>
<!-- End Footer -->
