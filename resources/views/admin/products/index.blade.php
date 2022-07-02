@extends('dashboard')
@section('title', Config::get('consts.pages.products.index.title'))
@section('scripts')
    <!-- Start Slider Script -->
    {{--    <script src="{{asset('assets/js/ajax.products.filters.js')}}" defer></script>--}}
    <!-- End Slider Script -->
@endsection
@section('content')
    {{--Heading--}}
    <x-section-heading>
        @slot('title', Config::get('consts.pages.products.index.main-heading'))
        @slot('subtitle', Config::get('consts.pages.products.index.sub-heading'))
    </x-section-heading>
    {{--Heading--}}

    {{--Table--}}
    <div class="col-9">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Edit</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">Price</th>
                <th scope="col">Stats</th>
            </tr>
            </thead>
            <tbody id="dashboard-products-table">
            @if(!empty($products))
                <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
                @foreach($products as $product)
                    <tr id="product-row-{{$product->id}}">
                        <td scope="row">
                            <img style="width: 100px"
                                 src="{{$product->images->first() ? $product->images->first()->url() : asset('storage/'. Config::get('consts.no-image'))}}"
                            alt="{{$product->name}}">
                        </td>
                        <td>
                            @if($product->deleted_at)
                                <del>
                                    @else
                                        <a href="{{route('products.show', ['product' => $product->id])}}">
                                    @endif
                                    {{$product->name}}
                                    @if($product->deleted_at)
                                </del>
                                @else
                                </a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary text-white mt-2" data-cart="{{$product->id}}"
                               href="{{route('products.edit', ['product' => $product->id])}}"><i
                                    class="fa fa-pen"></i></a>
                        </td>
                        <td class="product-quantity">
                            @if($product->deleted_at)
                                <p>
                                    <i class="fa fa-ban text-danger"></i>Removed {{$product->deleted_at->diffForHumans()}}
                                </p>
                                {{--                                <a href="{{ route('admin.products.restore', ['product' => $product->id]) }}">--}}
                                {{--                                    Restore--}}
                                {{--                                </a>--}}
                            @else
                                <i class="fa fa-check text-success"></i>
                                {{--                                @if(!$product->trashed())--}}
                                {{--                                    <div class="ms-4">--}}
                                {{--                                        <form style="display: none" id="delete-product-form" action="{{route('products.destroy', ['product' => $product->id])}}" method="POST">--}}
                                {{--                                            @csrf--}}
                                {{--                                            @method('DELETE')--}}
                                {{--                                            <button type="submit" class="btn btn-danger">Delete</button>--}}
                                {{--                                        </form>--}}
                                {{--                                        <a href="#"onclick="event.preventDefault();document.querySelector('#delete-product-form').submit()" >Deactivate</a>--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}
                            @endif
                        </td>

                        <td class="product-quantity">

                            @if($product->deleted_at)
                                <a href="{{ route('admin.products.restore', ['product' => $product->id]) }}">
                                    Restore
                                </a>
                            @else
                                @if(!$product->trashed())
                                    <div class="ms-4">
                                        <form style="display: none" id="delete-product-form"
                                              action="{{route('products.destroy', ['product' => $product->id])}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{--                                            <button type="submit" class="btn btn-danger">Delete</button>--}}
                                        </form>
                                        <a href="#"
                                           onclick="event.preventDefault();document.querySelector('#delete-product-form').submit()">Deactivate</a>
                                    </div>
                                @endif
                            @endif
                        </td>

                        <td>{{$product->price->price}}</td>
                        <td>
                            <a href="{{route('admin.products.stats', ['product' => $product->id])}}"
                               class="btn btn-primary"
                            ><i class="fas fa-chart-area"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            {{--Display pagination--}}
            <div class="d-flex justify-content-center">
                {!! $products->links() !!}
            </div>
            {{--Display pagination--}}
            </tbody>
        </table>
    </div>
    {{--Table--}}
@endsection
