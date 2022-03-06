<div class="row text-center py-3">
    <div class="col-lg-9 m-auto tempaltemo-carousel">
        <div class="row d-flex flex-row">

            {{-- Control - Left --}}
            <x-control>
                @slot('id', 'brand')
                @slot('type', 'prev')
                @slot('direction', 'left')
            </x-control>
            {{-- Control - Left --}}

            {{-- Carousel wrapper --}}
            <div class="col">
                <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">

                    <!--Slides-->
                    <div class="carousel-inner product-links-wap" role="listbox">

                        @foreach($items as $slide)
                            <x-carousel-slide>
                                @slot('type', $type)
                                @slot('slide', $slide)
                                @slot('idx', $loop->index)
                            </x-carousel-slide>
                        @endforeach

                    </div>
                    <!--End Slides-->

                </div>
            </div>
            {{-- Carousel wrapper --}}

            {{-- Control - Right --}}
            <x-control>
                @slot('id', 'brand')
                @slot('type', 'next')
                @slot('direction', 'right')
            </x-control>
            {{-- Control - Right --}}

        </div>
    </div>
</div>
