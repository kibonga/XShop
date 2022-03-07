<div class="col-md-4">
    <div class="card mb-4 product-wap rounded-0">

        <div class="card rounded-0">
            <img class="card-img rounded-0 img-fluid"
                 src="{{asset("assets/img/products/" . $product->images[0]->path )}}">

            {{--Hover Actions--}}
            @include('products.partials.index._hover-actions')
            {{--Hover Actions--}}

        </div>

        <div class="card-body">

            <div class="mb-3">
                <a href="shop-single.html" class="h3 text-decoration-none">{{$product->name}}</a>
            </div>
            <div>
                <span class="badge bg-primary">{{$product->category->name}}</span>
            </div>

            {{--Ratings--}}
            @include('products.partials.index._ratings')
            {{--Ratings--}}

            <p class="text-center mb-0">${{$product->prices[0]->price}}</p>
        </div>

    </div>
</div>
