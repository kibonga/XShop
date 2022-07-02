<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">

            {{--Header Contact Info--}}
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:{{$contactInfo['email']['value']}}">{{$contactInfo['email']['value']}}</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:{{$contactInfo['phone']['value']}}">{{$contactInfo['phone']['value']}}</a>
            </div>

            {{--Header Contact Info--}}

            {{-- Header Social Networks--}}
            <div>
                @foreach($socialInfo as $social)
                    <a class="text-light" href="{{$social['link']}}" target="_blank" rel="sponsored"><i
                            class="fab {{$social['icon']}} fa-sm fa-fw me-2"></i></a>
                @endforeach
            </div>
            {{-- Header Social Networks--}}

        </div>
    </div>
</nav>
<!-- Close Top Nav -->
@include('shared.fixed.nav')
