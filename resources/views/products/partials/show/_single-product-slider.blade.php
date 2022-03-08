<!--Start Controls-->
<div class="col-1 align-self-center">
    <a href="#multi-item-example" role="button" data-bs-slide="prev">
        <i class="text-dark fas fa-chevron-left"></i>
        <span class="sr-only">Previous</span>
    </a>
</div>
<!--End Controls-->

<!--Start Carousel Wrapper-->
<div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
    <!--Start Slides-->
    <div class="carousel-inner product-links-wap" role="listbox">


        {{--                @foreach($images as $image)--}}
        {{--                    <div class="col-4">--}}
        {{--                        <a href="#">--}}
        {{--                            <img class="card-img img-fluid" src="{{asset('assets/img/products/' . $image->path)}}"--}}
        {{--                                 alt="{{$name}}-{{$loop->index}}">--}}
        {{--                        </a>--}}
        {{--                    </div>--}}
        {{--                @endforeach--}}

        @for($i=0; $i<=4; $i++)
            <!--First slide-->
                <div class="carousel-item {{($i == 0) ? 'active' : ''}}">
                    <div class="row d-flex justify-content-center">
                        <div class="col-4">
                            <a href="#">
                                <img class="card-img img-fluid" src="{{asset('assets/img/products/' . $images[0]->path)}}"
                                     alt="{{$name}}-{{$i}}">
                            </a>
                        </div>
                    </div>
                </div>
                <!--/.First slide-->
        @endfor




        {{--        <!--Second slide-->--}}
        {{--        <div class="carousel-item">--}}
        {{--            <div class="row">--}}
        {{--                <div class="col-4">--}}
        {{--                    <a href="#">--}}
        {{--                        <img class="card-img img-fluid" src="{{asset('assets/img/product_single_04.jpg')}}" alt="Product Image 4">--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--                <div class="col-4">--}}
        {{--                    <a href="#">--}}
        {{--                        <img class="card-img img-fluid" src="{{asset('assets/img/product_single_05.jpg')}}" alt="Product Image 5">--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--                <div class="col-4">--}}
        {{--                    <a href="#">--}}
        {{--                        <img class="card-img img-fluid" src="{{asset('assets/img/product_single_06.jpg')}}" alt="Product Image 6">--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <!--/.Second slide-->--}}

        {{--        <!--Third slide-->--}}
        {{--        <div class="carousel-item">--}}
        {{--            <div class="row">--}}
        {{--                <div class="col-4">--}}
        {{--                    <a href="#">--}}
        {{--                        <img class="card-img img-fluid" src="{{asset('assets/img/product_single_07.jpg')}}" alt="Product Image 7">--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--                <div class="col-4">--}}
        {{--                    <a href="#">--}}
        {{--                        <img class="card-img img-fluid" src="{{asset('assets/img/product_single_08.jpg')}}" alt="Product Image 7">--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--                <div class="col-4">--}}
        {{--                    <a href="#">--}}
        {{--                        <img class="card-img img-fluid" src="{{asset('assets/img/product_single_09.jpg')}}" alt="Product Image 7">--}}
        {{--                    </a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <!--/.Third slide-->--}}
    </div>
    <!--End Slides-->
</div>
<!--End Carousel Wrapper-->


<!--Start Controls-->
<div class="col-1 align-self-center">
    <a href="#multi-item-example" role="button" data-bs-slide="next">
        <i class="text-dark fas fa-chevron-right"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--End Controls-->
