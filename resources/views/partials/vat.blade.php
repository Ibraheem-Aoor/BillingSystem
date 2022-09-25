<table class="table table-striped mb-0" id="report-dataTable">
    <thead>
        <tr role="row">
            <th>{{ __('S.No') }}</th>
            <th>{{ __('Invoice') }}</th>
            <th>{{ __('Customer') }}</th>
            <th>{{ __('Cash') }}</th>
            <th>{{ __('Residual') }}</th>
            <th>{{ __('Amount') }}</th>
            <th>{{ __('Vat') }}</th>
            <th>{{ __('Total') }}</th>
        </tr>
    </thead>

    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($sales as $sale)
            <tr class="font-style">
                <td>{{ $i++ }}</td>
                <td>{{ AUth::user()->invoiceNumberFormat($sale->id) }}</td>

                <td>{{ $sale->customer->name }}</td>
                <td>0</td>
                <td>{{$sale->getTotal()}}</td>
                <td>{{ $sale->getTotal() }}</td>
                <td>{{ $sale->vat }}</td>
                <td>{{ $sale->getTotal() + (($sale->vat/100) * $sale->rate) }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
