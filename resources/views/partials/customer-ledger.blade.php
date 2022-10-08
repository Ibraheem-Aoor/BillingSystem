<table class="table table-striped mb-0" id="report-dataTable">
    <thead>
        <tr role="row">
            <th>{{ __('S.No') }}</th>
            <th>{{ __('Invoice') }}</th>
            <th>{{ __('Product') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Qty') }}</th>
            <th>{{ __('Rate') }}</th>
            <th>{{ __('Total') }}</th>
            <th>{{ __('Vat') }}</th>
        </tr>
    </thead>

    <tbody>
        @php
            $i = 1;
            $sub_total = 0;
            $sub_total_vat = 0;
        @endphp
        @foreach ($sales as $sale)
            <tr class="font-style">
                <td>{{ $i++ }}</td>
                <td>{{ AUth::user()->invoiceNumberFormat($sale->id) }}</td>
                <td>{{ $sale->product->name }}</td>
                <td>{{ $sale->created_at }}</td>
                <td>{{$sale->quantity}}</td>
                <td>{{$sale->rate}}</td>
                @php
                    $sub_total += $sale->getTotal();
                    $sub_total_vat += $sale->vat;
                @endphp
                <td>{{ $sale->getTotal()}}</td>
                <td>{{$sale->vat}}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">Subtotal: </td>
            <td>{{$sub_total}}</td>
            <td>{{$sub_total_vat}}</td>
        </tr>
        <tr>
            <td colspan="6">{{__('Grand Total')}}</td>
            <td>{{$sub_total + (($sub_total_vat/100) * $sub_total)}}</td>
        </tr>
    </tfoot>
</table>

