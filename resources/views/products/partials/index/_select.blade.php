<div class="">
    <span>Search:</span>
    <div class="input-group">
        <div class="form-outline">
            <input type="text" id="search" name="search" class="form-control" />
        </div>
        <button type="button" name="searchSubmit" id="searchSubmit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-6 pb-4">
        <span>Sort:</span>
        <div class="d-flex">
            <select class="form-control" name="sort" id="sort">

                @foreach($sorts as $option)
                    <option value="{{$option['value']}}">{{$option['name']}}</option>
                @endforeach

            </select>
        </div>
    </div>

    <div class="col-md-6 pb-4">
        <span>Per page:</span>
        <div class="d-flex">
            <select class="form-control" name="perPage" id="perPage">

                @foreach($perPages as $option)
                    <option value="{{$option['value']}}">{{$option['name']}}</option>
                @endforeach

            </select>
        </div>
    </div>
</div>
