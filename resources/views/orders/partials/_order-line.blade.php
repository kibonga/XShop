<tr>
    <th scope="row">{{$index}}</th>
    <td>
        @if(!$line->product->deleted_at)
            <a href="{{route('products.show', ['product' => $line->product_id ])}}">
                @else
                    <del>
                        @endif
                        {{$line->product->name}}
                        @if(!$line->product->deleted_at)
                    </del>
                @else
            </a>
        @endif
    </td>
    <td>
        <a href="{{route('admin.products.stats', ['product' => $line->product_id])}}">
            <i class="fa fa-chart-bar"></i>
        </a>
    </td>
    <td>{{$line->price}}</td>
    <td>{{$line->quantity}}</td>
    <td>{{$line->quantity * $line->price}}</td>
    <td>{{$line->created_at->diffForHumans()}}</td>
</tr>
