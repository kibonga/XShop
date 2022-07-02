@extends('app')
@section('title', Config::get('consts.pages.author.title'))
@section('content')
        {{--Heading--}}
        <x-section-heading>
            @slot('title', Config::get('consts.pages.author.main-heading'))
            @slot('subtitle', Config::get('consts.pages.author.sub-heading'))
        </x-section-heading>
        {{--Heading--}}

        <div class="container my-5 d-flex">
            <div class="row">
                <div class="col-md-6 col-12">
                    <img class="img-fluid" src="{{asset('assets/img/author.JPG')}}" alt="author">
                </div>
                <div class="col-md-6 col-12 p-5 bg-light" >
                    <h3>About author</h3>
                    <p>I'm a amateur kickboxer, entrepreneur, currently residing in Studenjak. My main goal is to become proffesional kickobxer, I'm currently training in Zvornik's 058 Muay Thai club.</p>
                    <p>Oh, yeah I'm also a web devloper or smth...</p>
                    <p>I really hate jQuery, and i very much dislike PHP</p>
                    <p>I don't really mind Laravel</p>
                    <p>My prefered technologies are Angluar, Node.js, JavaScript, alongside TypeScript</p>
                    <p>This project was very much autistic, and I hope I'll never see it again</p>
                    <p>As wise mexican once said, I'm a build my own PHP framework, with blackjack and hookers...In fact forget about framework</p>
                    <p>And just like my man Pari likes to say: <br>
                        <span>
                            Braci, podižemo celzijus i u samom paklu
                        Lutan labirintom spida s novčanicom po staklu
                        Čudno se ponašan, iman nastran um
                        Obučen ka Gestapo, kurvu nabada na ud
                    </span>
                    </p>

                </div>
            </div>
        </div>

@endsection


