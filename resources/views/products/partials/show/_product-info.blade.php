<div class="col-lg-7 mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="h2">{{$product->name}}</h1>
            <p class="h3 py-2">${{$product->prices->first()->price}}</p>

            <p class="py-2">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-secondary"></i>
                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
            </p>

{{--            <ul class="list-inline">--}}
{{--                <li class="list-inline-item">--}}
{{--                    <h6>{{Config::get('consts.pages.products.show.headings.model')}}: </h6>--}}
{{--                </li>--}}
{{--                <li class="list-inline-item">--}}
{{--                    <p class="text-muted"><strong>{{$product->model->name}}</strong></p>--}}
{{--                </li>--}}
{{--            </ul>--}}

            @include('products.partials.show._additional-info',
                [
                    'title' => Config::get('consts.pages.products.show.headings.model'),
                    'value' => $product->model->name
                ]
            )

            @include('products.partials.show._additional-info',
                [
                    'title' => Config::get('consts.pages.products.show.headings.category'),
                    'value' => $product->category->name
                ]
            )

            {{--            <x-additional-info>--}}
            {{--                @slot('title', Config::get('consts.pages.products.show.headings.model'))--}}
            {{--                @slot('value', $product->model->name)--}}
            {{--            </x-additional-info>--}}

            <h6>{{Config::get('consts.pages.products.show.headings.description')}}: </h6>
            <p>{{$product->description}}</p>

            @include('products.partials.show._additional-info',
                [
                    'title' => Config::get('consts.pages.products.show.headings.color'),
                    'value' => ucfirst($product->color->name)
                ]
            )

{{--            <h6>Specification:</h6>--}}
{{--            <ul class="list-unstyled pb-3">--}}
{{--                <li>Lorem ipsum dolor sit</li>--}}
{{--                <li>Amet, consectetur</li>--}}
{{--                <li>Adipiscing elit,set</li>--}}
{{--                <li>Duis aute irure</li>--}}
{{--                <li>Ut enim ad minim</li>--}}
{{--                <li>Dolore magna aliqua</li>--}}
{{--                <li>Excepteur sint</li>--}}
{{--            </ul>--}}

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
