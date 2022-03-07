<div class="col-lg-3">
    <h3 class="h2 pb-4">{{Config::get('consts.pages.products.index.headings.filters')}}</h3>
    <ul class="list-unstyled templatemo-accordion">

        {{--Categories checkboxes--}}
        <x-checkbox-list>
            @slot('title', Config::get('consts.pages.products.index.filters.categories'))
            @slot('items', $categories)
            @slot('name', 'categories')
        </x-checkbox-list>
        {{--Categories checkboxes--}}

        {{--Models checkboxes--}}
        <x-checkbox-list>
            @slot('title', Config::get('consts.pages.products.index.filters.models'))
            @slot('items', $models)
            @slot('name', 'models')
        </x-checkbox-list>
        {{--Modles checkboxes--}}

        {{--Colors checkboxes--}}
        <x-checkbox-list>
            @slot('title', Config::get('consts.pages.products.index.filters.colors'))
            @slot('items', $colors)
            @slot('name', 'colors')
        </x-checkbox-list>
        {{--Colors checkboxes--}}
    </ul>
</div>
