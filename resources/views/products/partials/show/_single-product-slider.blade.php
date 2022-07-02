<!--Start Controls-->
@if($images->first())
    <div class="col-1 align-self-center">
        <a href="#multi-item-example" class="show-slider-action" role="button" data-bs-slide="prev">
            <i class="text-dark fas fa-chevron-left"></i>
            <span class="sr-only">Previous</span>
        </a>
    </div>
@endif
<!--End Controls-->

<!--Start Carousel Wrapper-->
<div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
    <!--Start Slides-->
    <div class="carousel-inner product-links-wap" role="listbox">


    @foreach($images as $image)
        <!--First slide-->
            <div class="carousel-item {{($loop->index == 0) ? 'active' : ''}}">
                <div class="row d-flex justify-content-center">
                    <div class="col-4">
                        <a href="#">
                            <img class="card-img img-fluid" src="{{$image->url()}}"
                                 alt="{{$name}}-{{$loop->index}}">
                        </a>
                    </div>
                </div>
            </div>
            <!--/.First slide-->
        @endforeach

    </div>
    <!--End Slides-->
</div>
<!--End Carousel Wrapper-->

@if($images->first())
<!--Start Controls-->
<div class="col-1 align-self-center">
    <a href="#multi-item-example" class="show-slider-action" role="button" data-bs-slide="next">
        <i class="text-dark fas fa-chevron-right"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
@endif
<!--End Controls-->
