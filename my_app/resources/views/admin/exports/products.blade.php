<table>
    <thead>
        <tr>
            <th width="250px">{{ __("Product's name") }}</th>
            <th width="100px">{{ __('Stock') }}</th>
            <th width="100px">{{ __('Price') }}</th>
            <th width="130px">{{ __('Discount percent') }}</th>
            <th width="250px">{{ __("Category's name") }}</th>
            <th width="350px">{{ __("Description", ['name' => __('Product')]) }}</th>
        </tr>
    </thead>
    <tbody>
        @if (!blank($products))
            @foreach($products as $product)

            @endforeach
        @endif
    </tbody>
</table>
