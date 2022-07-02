<tr>
    <th scope="row">{{$index}}</th>
    <td><a href="{{route('products.show', ['product' => $line->product_id ])}}">{{$line->product->name}}</a></td>
    <td>{{$line->price}}</td>
    <td>{{$line->quantity}}</td>
    <td>{{$line->quantity * $line->price}}</td>
</tr>
