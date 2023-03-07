<!doctype html>
<meta charset="utf-8">
<style>
    html {
        /* off-white, so body edge is visible in browser */
        background: #eee;
    }


    /* fill half the height with each face */
    .face {
        height: 50%;
        width: 100%;
        position: relative;
    }

    /* the back face */
    .face-back {
        background: #f6f6f6;
    }

    /* the front face */
    .face-front {
        background: #fff;
    }

    /* an image that fills the whole of the front face */
    .face-front img {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        padding: 0;
    }

    p {
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin-right: auto;
        margin-left: auto;
    }

    .brand-section {
        background-color: #0d1033;
        padding: 10px 40px;
    }

    .logo {
        width: 50%;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-6 {
        width: 50%;
        flex: 0 0 auto;
    }

    .text-white {
        color: #fff;
    }

    .company-details {
        float: right;
        text-align: right;
    }

    .body-section {
        padding: 16px;
        border: 1px solid gray;
    }

    .heading {
        font-size: 20px;
        margin-bottom: 08px;
        text-align: center
    }

    .heading:last-of-type {
        color: red !important;
    }

    .sub-heading {
        color: #262626;
        margin-bottom: 05px;
        text-align: center;
    }

    .badge {
        color: #fff !important;
        background: red !important;
        /* width:50px !important; */
        /* height:  50px !important; */
        padding: 5px !important;
        /* border-radius: 50% !important; */
    }

    table {
        background-color: #fff;
        width: 100%;
        border-collapse: collapse;
    }

    table thead tr {
        border: 1px solid #111;
        background-color: #f2f2f2;
    }

    table td {
        vertical-align: middle !important;
        text-align: center;
    }

    table th,
    table td {
        padding-top: 08px;
        padding-bottom: 08px;
    }

    .table-bordered {
        width: 100% !important;
        box-shadow: 0px 0px 5px 0.5px red;
        margin-bottom: 5% !important;

    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid red;
        /* width:100% !important; */
        font-size: 12px !important;
    }

    .text-right {
        text-align: end;
    }

    .w-20 {
        width: 20%;
    }

    .float-right {
        float: right;
    }

    ul li {
        list-style-type: none !important;
    }

    .float-parent-element {
        width: 100% !important;
    }

    .float-child-element {
        float: left;
        width: 50%;
    }

    .red {
        margin-right: 50% !important;
        height: 100px;
    }

    .yellow {
        margin-left: 30% !important;
        height: 100px;
    }

    li span {
        font-size: 13px !important;
        font-weight: bold !important;
        color: #111;
    }
</style>

<body>
    <div class="face face-back">
        <div class="body-section">

            <h6>
                <div class="float-parent-element" style="padding-left: 2% !important;">

                    <div class="float-child-element">
                        <div class="red">
                            <ul>
                                <li>
                                    <span> INVOICE NO: {!! $invoice_number !!}</span>
                                </li>
                                <li>
                                    <span>DATE: {{ \Carbon\Carbon::today()->format('Y-M-d') }}</span>
                                </li>
                                <li>
                                    <span> CUSTOMER: {{ $invoices->first()->customer->name }} </span>
                                </li>
                                <li>
                                    <span> CUSTOMER TRN: {{ $invoices->first()->customer->trn }} </span>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="float-child-element">
                        <div class="yellow">
                            <ul>
                                <li>
                                    <span>DRIVER NAME: {{ $invoices[0]->driver->name }}</span>
                                </li>
                                <li>
                                    <span> Vechile No: {{ $invoices[0]->car?->no }}</span>
                                </li>
                                <li>
                                    <span>Location: {{ $invoices[0]->location }}</span>
                                </li>
                                <li>
                                    <span> LPO No.: {{ $invoices[0]->lop }}</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </h6>

            <br>
            <table class="table-bordered">
                <tbody>
                    @php
                        $i = 1;
                        $sub_total = 0;
                        $subtotal_vat = 0;
                    @endphp
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $invoice->description }}</td>
                            <td>{{ $invoice->quantity }}</td>
                            <td>{{ $invoice->rate }}</td>
                            {{-- <td>{{ $invoice->discount ?? 0 }}</td> --}}
                            @php
                                $sub_total += (float) $invoice->getTotal();
                                $subtotal_vat += ($invoice->vat / 100) * $invoice->getTotal();
                            @endphp
                            <td>{{ (float) $invoice->getTotal() + $invoice->getTotal() * ($invoice->vat / 100) }}
                            </td>
                            <td>{{ $invoice->vat }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" style="text-align: left;">Subtotal</td>
                        <td>{{ $subtotal_vat }}
                        </td>
                        <td>
                            {{ $sub_total }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: left;">Total:
                            {{ $number_formatter->format($sub_total + $subtotal_vat) }}</td>
                        <td>{{ $sub_total + $subtotal_vat }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br>
        {{-- <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3> --}}
    </div>
    {{-- @include('vendor.invoices.templates.default_copy', $data) --}}
    </div>
    {{-- <div class="face face-front"><img src="front.png">TEST CONTENT</div> --}}
</body>
