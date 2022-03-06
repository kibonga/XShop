<!--Start slide-->
<div class="carousel-item {{$idx === 0 ? 'active': ''}}">
    <div class="row">
        @foreach($slide as $item)
            <x-carousel-slide-item>
                @slot('type', $type)
                @slot('item', $item)
                @slot('idx', $loop->index)
            </x-carousel-slide-item>
        @endforeach
    </div>
</div>
<!--End slide-->

