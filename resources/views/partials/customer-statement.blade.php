<table class="table table-striped mb-0" id="report-dataTable">
    <thead>
        <tr role="row">
            <th>{{ __('S.No') }}</th>
            <th>{{ __('Invoice') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Cash') }}</th>
            <th>{{ __('Residual') }}</th>
            <th>{{ __('Total') }}</th>
        </tr>
    </thead>

    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($invoices as $invoice)
            <tr class="font-style">
                <td>{{ $i++ }}</td>
                <td>{{ AUth::user()->invoiceNumberFormat($invoice->invoice_id) }}</td>
                <td>{{ $invoice->issue_date }}</td>
                <td>0</td>
                <td>{{$invoice->getTotal()}}</td>
                <td>{{$invoice->getTotal()}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

