<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $invoice->name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style type="text/css" media="screen">
        html {
            font-family: sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            font-size: 10px;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4,
        .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
        }

        .table.table-items td {
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        * {
            font-family: "DejaVu Sans";
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .total-amount {
            font-size: 12px;
            font-weight: 700;
        }

        .border-0 {
            border: none !important;
        }

        .cool-gray {
            color: #6B7280;
        }

        body {
            height: 15vh !important;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @if ($invoice->logo)
        <img src="{{ $invoice->getLogo() }}" alt="logo" height="100">
    @endif


    <table class="table mt-5" style="width:90%;">

        <tbody>
            <tr>
                <td class="border-0 pl-0" width="70%">
                    <h4 class="text-uppercase">
                        <strong>TAX INVOICE</strong>
                    </h4>
                    <h3>
                        <strong>
                            AL HIDAYAH BLDG.MAT.TR.CO.L.L.C
                        </strong><br>
                        <strong>
                            P.O Box: 28929, Sajah, Sharjah-UAE
                        </strong><br>
                        <strong>
                            Mob: 050 - 5294562 , 056 -5655842
                        </strong><br>
                        <strong>
                            E-Mail: al.hidayah.building6720@gmail.com
                        </strong><br>
                        <strong>
                            TRN: 100469647000003
                        </strong>
                    </h3>
                </td>
                <td class="border-0 pl-0">
                    @if ($invoice->status)
                        <h4 class="text-uppercase cool-gray">
                            {{-- <strong>{{ $invoice->status }}</strong> --}}
                        </h4>
                    @endif
                    <p>{{ __('invoices::invoice.serial') }}
                        <strong>{{ \App\Models\Utility::invoiceNumberFormat($settings, $invoice->invoice_id) }}</strong>
                    </p>
                    <p>{{ __('invoices::invoice.date') }}:
                        <strong>{{ \App\Models\Utility::dateFormat($settings, $invoice->issue_date) }}</strong>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- Seller - Buyer --}}
    <table class="table">
        {{-- <thead>
            <tr>
                <th class="border-0 pl-0 party-header" width="48.5%">
                    {{ __('invoices::invoice.seller') }}
                </th>
                <th class="border-0" width="3%"></th>
                <th class="border-0 pl-0 party-header">
                    {{ __('invoices::invoice.buyer') }}
                </th>
            </tr>
        </thead> --}}
        <tbody>
            <tr>
                <td class="px-0">
                    <p class="seller-name">
                        Invoice No: {{ \App\Models\Utility::invoiceNumberFormat($settings, $invoice->invoice_id) }}
                    </p>

                    <p class="seller-address">
                        Date: {{ \App\Models\Utility::dateFormat($settings, $invoice->issue_date) }}
                    </p>

                    <p class="seller-code">
                        Customer:
                        {{ !empty($customer->billing_name) ? $customer->billing_name : '' }}
                    </p>

                    <p class="seller-vat">
                        Customer TRN: {{ !empty($customer->trn) ? $customer->trn : '' }}
                    </p>
                </td>
                <td class="border-0"></td>
                <td class="px-0">
                    <p class="buyer-address">
                        Driver Name:
                    </p>

                    <p class="buyer-code">
                        Vechile No.:
                    </p>

                    <p class="buyer-vat">
                        Location
                    </p>

                    <p class="buyer-phone">
                        LOP No.: {{ !empty($customer->shipping_address) ? $customer->shipping_address : '' }}
                    </p>

                </td>
            </tr>
        </tbody>
    </table>

    {{-- Table --}}
    <table class="table table-items" style="width:90%;">
        <thead>
            <tr>
                <th scope="col" class="text-center border-0">S.No.</th>
                <th scope="col" class="text-center border-0">Name</th>
                <th scope="col" class="border-0 pl-0">Description</th>
                <th scope="col" class="text-center border-0">Qty</th>
                <th scope="col" class="text-right border-0">Price</th>
                {{-- @if ($invoice->hasItemDiscount)
                    <th scope="col" class="text-right border-0">{{ __('invoices::invoice.discount') }}</th>
                @endif --}}
                @if ($invoice->hasItemTax)
                    <th scope="col" class="text-right border-0">{{ __('invoices::invoice.tax') . '  5%' }}</th>
                @endif
                <th scope="col" class="text-right border-0 pr-0">Total</th>
            </tr>
        </thead>
        <tbody>
            {{-- Items --}}
            @if (isset($invoice->itemData) && count($invoice->itemData) > 0)
                @php
                    $i = 1;
                @endphp
                @foreach ($invoice->itemData as $key => $item)
                    <tr>
                        <td class="pl-0">
                            <p class="cool-gray"> {{ $i++ }}</p>
                        </td>
                        <td class="text-center">{{ $item->name }}</td>
                        <td class="text-center"> {{ !empty($item->description) ? $item->description : '' }}</td>
                        <td class="text-right">
                            {{ $item->quantity }}
                        </td>
                        <td class="text-right">
                            {{ \App\Models\Utility::priceFormat($settings, $item->price) }}
                        </td>
                        <td class="text-right">
                            {{ \App\Models\Utility::priceFormat($settings, $item->price * $item->quantity) }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    @if ($invoice->notes)
        <p>
            {{ trans('invoices::invoice.notes') }}:
        </p>
    @endif


    <table class="table">
        <tbody>
            <tr>
                <td class="px-0">
                    <p class="seller-name">
                        Grand Total:
                        {{ \App\Models\Utility::priceFormat($settings, $invoice->getSubTotal() - $invoice->getTotalDiscount() + $invoice->getTotalTax()) }}
                    </p>
                </td>
                <td class="border-0"></td>
                <td class="px-0">
                    <p class="buyer-address">
                        {{ trans('invoices::invoice.pay_until') }}

                    </p>
                </td>
            </tr>
            <tr>
                <td class="px-0">
                    <p class="seller-name">
                        Reciver's Sign:__________________
                    </p>
                </td>
                <td class="border-0"></td>
                <td class="px-0">
                    <p class="buyer-address">
                        Signature:__________________
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- <p>
        {{ trans('invoices::invoice.amount_in_words') }}: {{ $invoice->getTotalAmountInWords() }}
    </p> --}}


    <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
</body>

</html>
