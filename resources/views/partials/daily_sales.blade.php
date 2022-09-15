<table class="table table-striped mb-0" id="report-dataTable">
    <thead>
        <tr role="row">
            <th>{{ __('S.No') }}</th>
            <th>{{ __('Product') }}</th>
            <th>{{ __('Quantity') }}</th>
            <th>{{ __('Rate') }}</th>
            <th>{{ __('Vat') }}</th>
            <th>{{ __('Total') }}</th>
            <th>{{ __('Location') }}</th>
            <th>{{ __('LPO') }}</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($sales as $sale)
            <tr class="font-style">
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->product->name }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ $sale->rate }}</td>
                <td>{{ $sale->vat }}</td>
                <td>{{ $sale->total }}</td>
                <td>{{ $sale->location }}</td>
                <td>{{ $sale->lpo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
