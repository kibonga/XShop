<li class="pb-3">
    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
        {{$title}}
{{--        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>--}}
    </a>
    <form>
        <ul class="collapse show list-unstyled pl-3">
            @foreach($items as $item)
                <li><input type="checkbox" name="{{$name}}" value="{{$item->id}}">{{$item->name}}</li>
            @endforeach
        </ul>
    </form>
</li>
