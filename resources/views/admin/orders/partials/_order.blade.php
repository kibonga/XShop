<tr>
    @php $total = 0; @endphp
    @foreach($order->orderLines as $line)
{{--        {{(int)$line->quantity}}--}}
        @php
            $total += $line->quantity * $line->price;
        @endphp
    @endforeach
    <th scope="row">{{$order->id}}</th>
    <td><a href="{{route('orders.show', ['order' => $order->id ])}}">{{$order->user->name}} {{$order->user->last_name}}</a></td>
    <td>{{$order->user->email}}</td>
    <td>{{$total}}</td>
    <td>{{$order->created_at->diffForHumans()}}</td>
</tr>
