@foreach($navs as $nav)
    <li class="nav-item">
        <a class="nav-link" href="{{ route($nav['route']) }}">{{$nav['name']}}</a>
    </li>
@endforeach
