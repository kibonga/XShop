<ul class="list-unstyled d-flex justify-content-center mb-1">
    <li>
        @php $stop = random_int(3,5); @endphp
        @for($i=1; $i<=5; $i++)
            @if($stop < $i)
                <i class="text-muted fa fa-star"></i>
            @else
                <i class="text-warning fa fa-star"></i>
            @endif
        @endfor
    </li>
</ul>
