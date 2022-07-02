<tr>
    @php $total = 0; @endphp
    @foreach($order->orderLines as $line)
        {{--        {{(int)$line->quantity}}--}}
        @php
            $total += $line->quantity * $line->price;
        @endphp
    @endforeach
    @if($total > 0)
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->user->name}} {{$order->user->last_name}}</td>
        <td>{{$order->user->email}}</td>
        <td>
            <span class="p-2 badge bg-success">${{$total}}</span>
        </td>
        <td>{{$order->created_at->diffForHumans()}}</td>
        <td><a href="{{route('admin.orders.show', ['order' => $order->id ])}}"><i class="fa fa-chart-area"></i></a></td>
    @endif
</tr>
