<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            {{--Contact info--}}
            @include('shared.fixed.footer._contact-info')
            {{--Contact info--}}

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
            @include('shared.fixed.footer._nav')
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
                        @include('shared.fixed.footer._social-network')
                    @endforeach
                    {{-- Footer Social Networks--}}

                </ul>
            </div>

            {{--Footer subscription--}}
            @include('shared.fixed.footer._subscription')
            {{--Footer subscription--}}

        </div>
    </div>

    @include('shared.fixed.footer._copyright')

</footer>
<!-- End Footer -->
