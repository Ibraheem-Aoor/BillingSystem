<!doctype html>
<meta charset="utf-8">
<style>
    html {
        /* off-white, so body edge is visible in browser */
        background: #eee;
    }

    body {
        /* A5 dimensions */
        height: 210mm;
        width: 148.5mm;

        margin: 0;
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
        font-size: 9px !important;
    }
</style>

<body>
    <div class="face face-back">
        <div class="body-section">
            <h3 class="heading">شركة الهداية لتجارة مواد البناء ذ.م.م</h3>
            <h3 class="heading">AL HIDAYAH BLDG. MAT. TR. CO. L.L.C</h3>
            <h6 class="sub-heading">
                <span>
                    P.O BOX: 28929 , Sajah , Sahrjah - U.A.E | ص.ب: ٢٨٩٢٩ , الصجعة, الشارقة - أ.ع.م
                </span>
            </h6>
            <h6 class="sub-heading">
                <span>
                    MOb: 050 - 5294562 , 056 - 5655842 | متحرك: ۰٥۰ - ٥۲۹٤٥٦۲ , ۰٥٦ - ٥٦٥٥۸٤۲
                </span>
            </h6>
            <h6 class="sub-heading">
                E-Mail: al.hidayah.building6720@gmail.com <br>
                TRN: 100469647000003
            </h6>

            <h6 class="sub-heading" style="margin-top: 5px !important;color:red;margin-bottom:7px !important;">
                BULIDING MATERIALS | نقل مواد البناء
            </h6>
            <h6 class="sub-heading">
                <span class="badge">
                    TAX INVOICE | فاتورة ضريبة
                </span>
            </h6>
            <h6>
                <div class="float-parent-element">

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
                                    <span> CUSTOMER: </span>
                                </li>
                                <li>
                                    <span> CUSTOMER TRN:</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="float-child-element">
                        <div class="yellow">
                            <ul>
                                <li>
                                    <span>DRIVER NAME: {{$invoices[0]->driver->name}}</span>
                                </li>
                                <li>
                                    <span> Vechile No: {{$invoices[0]->car->no}}</span>
                                </li>
                                <li>
                                    <span>Location: {{$invoices[0]->location}}</span>
                                </li>
                                <li>
                                    <span> LPO No.: {{$invoices[0]->lop}}</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </h6>

            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20"> رقم <br>S.No </th>
                        <th class="w-20">المنتج <br> Product</th>
                        <th class="w-20">التفاصيل <br> Description</th>
                        <th class="w-20">الكمية <br> QTY</th>
                        <th class="w-20">السعر <br> Price</th>
                        <th class="w-20">الضريبة <br> VAT %</th>
                        {{-- <th class="w-20">الخصم <br> Discount</th> --}}
                        <th class="w-20">المبلغ <br> Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        $sub_total = 0;
                    @endphp
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $invoice->product->name }}</td>
                        <td>{{ $invoice->description }}</td>
                        <td>{{ $invoice->quantity }}</td>
                        <td>{{ $invoice->rate }}</td>
                        <td>{{ $invoice->vat * $invoice->getTotal()  }}</td>
                        {{-- <td>{{ $invoice->discount ?? 0 }}</td> --}}
                        @php
                            $sub_total += (float)$invoice->getTotal();
                        @endphp
                        <td>{{(float)$invoice->getTotal() +  ($invoice->getTota() * ($invoice->vat / 100))}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" style="text-align: left;">Subtotal</td>
                        <td>{{$subtotal_vat}}
                        </td>
                        <td>
                            {{$sub_total}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: left;">Total: {{$number_formatter->format($sub_total + (($subtotal_vat / 100) * $sub_total))}}</td>
                        <td>{{$sub_total + (($subtotal_vat / 100) * $sub_total)}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="float-parent-element">
                <div class="float-child-element">
                    <div class="red" style="margin-right:30% !important;">
                        Reciver's Sign:______________ توقيع المستلم
                    </div>
                </div>

                <div class="float-child-element">
                    <div class="yellow">
                        Signature:_______________
                    </div>
                </div>

            </div>

            <br>
            {{-- <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3> --}}
        </div>
        {{-- @include('vendor.invoices.templates.default_copy', $data) --}}
    </div>
    {{-- <div class="face face-front"><img src="front.png">TEST CONTENT</div> --}}
</body>
