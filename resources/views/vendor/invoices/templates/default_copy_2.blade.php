<!doctype html>
<meta charset="utf-8">
<style>
    @page {
        /* dimensions for the whole page */
        size: A5;

        margin: 0;
    }

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
        box-shadow: 0px 0px 5px 0.5px gray;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;
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
                <div style="display: inline-block !important; vertical-align:top;width:40% !important;">
                    <ul style="text-align: left !important;">
                        <li>
                            INVOICE NO:
                        </li>
                        <li>
                            DATE:
                        </li>
                        <li>
                            CUSTOMER:
                        </li>
                        <li>
                            CUSTOMER TRN:
                        </li>
                    </ul>
                </div>
                <div style="display: inline-block !important; vertical-align:top;width:40% !important;">
                    <ul style="text-align: right !important;">
                        <li>
                            DRIVER NAME:
                        </li>
                        <li>
                            Vechile No:
                        </li>
                        <li>
                            Location:
                        </li>
                        <li>
                            LPO No.:
                        </li>
                    </ul>
                </div>

            </h6>

            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20"> رقم <br>S.No </th>
                        <th class="w-20">التفاصيل <br> Description</th>
                        <th class="w-20">الكمية <br> QTY</th>
                        <th class="w-20">السعر <br> Price</th>
                        <th class="w-20">المبلغ <br> Total</th>
                        <th class="w-30">الضريبة <br> VAT 5%</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Test</td>
                        <td>10</td>
                        <td>1</td>
                        <td>10</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;">Total</td>
                        <td> 10.XX</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: left;">Grand Total</td>
                        <td> 2</td>
                    </tr>
                </tbody>
            </table>
            <div style="display: inline-block !important; vertical-align:top !important;">
                Reciver's Sign:_________________ توقيع المستلم
            </div>
            <div style="display: inline-block !important; vertical-align:top !important;">
                Signature:_________________ توقيع المستلم

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
