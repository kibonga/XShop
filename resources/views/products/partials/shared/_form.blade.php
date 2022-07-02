@csrf
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{old('name', $product->name ?? null)}}">
</div>
<div class="form-floating mb-3">
    {{--    <label for="content">Content</label>--}}
    <textarea class="form-control" name="description" id="description"
              style="width: 100%">{{old('description', $product->description ?? null)}}</textarea>
</div>
<div class="mb-3">
    <label for="name" class="form-label">Price</label>
    <input type="text" name="price" id="price" class="form-control"
           value="{{old('price', $product->price->price ?? null)}}">
</div>
<div class="mb-3 form-group">
    <label for="thumbnail">Add new Image</label>
    <input type="file" name="image" id="image" class="form-control">
</div>

@if(isset($product) && $product->images)
    <div class="row">
        <div class=" pb-4">
            <span>Remove Image/Images: </span>
            <div class="form-group" id="remove-images-checkboxes-placholder">
                @foreach($product->images as $image)
                    <div class="form-control">
                        <input type="checkbox" name="remove_images[]" value="{{$image->id}}">
                        <img style="width: 50px;" src="{{$image->url()}}" alt="">
                        <span>Path: {{$image->path}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="remove-images-placholder" class="d-flex  mb-4">
        No image available
    </div>
@endif

<div class="row">
    <div class="col-md-4 pb-4">
        <span>Categories:</span>
        <div class="d-flex">
            <select class="form-control" name="category_id" id="category_id">

                @foreach($categories as $option)
                    @if(isset($product))
                        <option
                            {{($option['id'] == $product->category_id) ? 'selected' : null }}  value="{{$option->id}}">{{$option->name}}</option>
                    @else
                        <option value="{{$option->id}}">{{$option->name}}</option>
                    @endif
                @endforeach

            </select>
        </div>
    </div>
    <div class="col-md-4 pb-4">
        <span>Models:</span>
        <div class="d-flex">
            <select class="form-control" name="model_id" id="model_id">

                @foreach($models as $option)
                    @if(isset($product))
                        <option
                            {{($option['id'] == $product->model_id) ? 'selected' : null }}  value="{{$option->id}}">{{$option->name}}</option>
                    @else
                        <option value="{{$option->id}}">{{$option->name}}</option>
                    @endif
                @endforeach

            </select>
        </div>
    </div>
    <div class="col-md-4 pb-4">
        <span>Colors:</span>
        <div class="d-flex">
            <select class="form-control" name="color_id" id="color_id">

                @foreach($colors as $option)
                    @if(isset($product))
                        <option
                            {{($option['id'] == $product->color_id) ? 'selected' : null }} value="{{$option->id}}">{{$option->name}}</option>
                    @else
                        <option value="{{$option->id}}">{{$option->name}}</option>
                    @endif
                @endforeach

            </select>
        </div>
    </div>

</div>

<x-errors></x-errors>
