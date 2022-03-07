<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">

            {{--Header Contact Info--}}
            @include('shared.fixed.nav._contact-info')
            {{--Header Contact Info--}}

            {{-- Header Social Networks--}}
            <div>
                @foreach($socialInfo as $social)
                    @include('shared.fixed.nav._social-netowork')
                @endforeach
            </div>
            {{-- Header Social Networks--}}

        </div>
    </div>
</nav>
<!-- Close Top Nav -->
@include('shared.fixed.nav')
