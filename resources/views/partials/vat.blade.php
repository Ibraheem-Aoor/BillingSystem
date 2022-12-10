<table class="table table-striped mb-0" id="report-dataTable">
    <thead>
        <tr role="row">
            @if ($request_segment == 'vat-report')
                <th><input type="checkbox" class="check_all"></th>
            @endif
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
                @if ($request_segment == 'vat-report')
                    <th><input type="checkbox" name="ids[]" value="{{ $sale->id }}"></th>
                @endif
                <td>{{ $i++ }}</td>
                <td>{{ AUth::user()->invoiceNumberFormat($sale->id) }}</td>
                <td>{{ $sale->customer->name }}</td>
                <td>0</td>
                <td>{{ $sale->getTotal() }}</td>
                <td>{{ $sale->getTotal() }}</td>
                <td>{{ $sale->vat }}</td>
                <td>{{ $sale->getTotal() + ($sale->vat / 100) * $sale->getTotal() }}</td>
            </tr>
            </tr>
        @endforeach
    </tbody>
</table>
