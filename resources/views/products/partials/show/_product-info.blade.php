<div class="col-lg-7 mt-5">
    <div class="card">
        <div class="card-body">

            {{--Name and price--}}
            <h1 class="h2">{{$product->name}}</h1>
            <p class="h3 py-2">${{$product->price->price}}</p>
            {{--Name and price--}}


            @auth
                <div id="crud-actions" class="d-flex">
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

            {{--     Rating and pagination       --}}
            <p class="py-2">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-secondary"></i>
                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
            </p>
            {{--     Rating and pagination       --}}


            {{--Model for prouduct--}}
            @include('products.partials.show._additional-info',
                [
                    'title' => Config::get('consts.pages.products.show.headings.model'),
                    'value' => $product->model->name
                ]
            )
            {{--Model for prouduct--}}

            {{--Category for prouduct--}}
            @include('products.partials.show._additional-info',
                [
                    'title' => Config::get('consts.pages.products.show.headings.category'),
                    'value' => $product->category->name
                ]
            )
            {{--Category for prouduct--}}

            {{-- Description --}}
            <h6>{{Config::get('consts.pages.products.show.headings.description')}}: </h6>
            <p>{{$product->description}}</p>
            {{-- Description --}}

            {{-- Color for product--}}
            @include('products.partials.show._additional-info',
                [
                    'title' => Config::get('consts.pages.products.show.headings.color'),
                    'value' => ucfirst($product->color->name)
                ]
            )
            {{-- Color for product--}}

            <form action="" method="GET">
                <input type="hidden" name="product-title" value="Activewear">
                <div class="row">
                    <div class="col-auto">
                        <ul class="list-inline pb-3">
                            <li class="list-inline-item text-right">
                                Quantity
                                <input type="hidden" name="product-quanity" id="product-quanity"
                                       value="1">
                            </li>
                            <li class="list-inline-item"><span class="btn btn-success"
                                                               id="btn-minus">-</span></li>
                            <li class="list-inline-item"><span class="badge bg-secondary"
                                                               id="var-value">1</span></li>
                            <li class="list-inline-item"><span class="btn btn-success"
                                                               id="btn-plus">+</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col d-grid">
                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">
                            Buy
                        </button>
                    </div>
                    <div class="col d-grid">
                        <button type="submit" class="btn btn-success btn-lg" name="submit"
                                value="addtocard">Add To Cart
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
