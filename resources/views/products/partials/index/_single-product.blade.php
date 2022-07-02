<div class="col-md-4">
    <div class="card mb-4 product-wap rounded-0">

        <div class="card rounded-0">
            <img class="card-img rounded-0 img-fluid"
                 {{--                 src="{{asset("storage/img/products/" . $product->images->first()->path )}}">--}}
                 src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}">

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

            <p class="text-center mb-0">${{$product->price->price}}</p>
        </div>

        @auth
            <div id="crud-actions" class="card-footer d-flex">
                @if(Auth::user()->isAdmin())
                    @can('create', $product)
                        <div>
                            <a href="{{route('products.edit', ['product' => $product->id])}}"
                               class="btn btn-primary text-white">EDIT</a>
                        </div>
                    @endcan
                    @can('delete', $product)
                        @if(!$product->trashed())
                            <div class="ms-4">
                                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deactivate</button>
                                </form>
                            </div>
                        @endif
                    @endcan
                @endif
            </div>
        @endauth


    </div>
</div>
