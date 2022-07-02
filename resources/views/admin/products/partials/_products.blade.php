@foreach($product as $product)
    <div class="col-9">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody id="dashboard-products-table">
            @if(!empty($products))
                @foreach($products as $product)
                    <tr id="product-row-{{$product->id}}">
                        <td scope="row">
                            <img style="width: 100px" src="{{$product->images[0]->url()}}" alt="{{$product->name}}">
                        </td>
                        <td>{{$product->name}}</td>
                        <td class="product-quantity">
                            <a href="#" data-id="{{$product->id}}" data-action="subtract" class="quantity-control"><i
                                    class="fa fa-minus-circle quantity-control" aria-hidden="true"></i></a>
                            <span>{{$product->deleted_at}}111</span>
                            <a href="#" data-id="{{$product->id}}" data-action="add" class="quantity-control"><i
                                    class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </td>
                        <td>{{$product->price->price}}</td>
                        <td>
                            <a href="#" id="remove-product-{{$product->id}}" class="btn btn-danger remove-product"
                               data-id="{{$product->id}}">X</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endforeach
