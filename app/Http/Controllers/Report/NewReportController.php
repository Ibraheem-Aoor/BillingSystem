<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\ProductService;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use NumberFormatter;
use Stripe\Product;
use PDF;

class NewReportController extends Controller
{

    private  $sales , $customers;
    public function __construct()
    {
        $this->sales = Sale::orderByDesc('created_at')->paginate(15);
        $this->customers = Customer::all();
    }
    /**
     * Daily Sales Reports
     */
    public function dailySaleIndex()
    {
        $data['sales'] = $this->sales;
        return $this->getSalesTable($data);
    }//End index

    public function filterDailySale(Request $request)
    {
        $data['sales'] = Sale::where('created_at' , 'like' , '%'.$request->date.'%')->orderByDesc('created_at')->paginate(15);
        $view = view('partials.daily_sales' , $data)->render();
        return response()->json(['status' => true , 'view' => $view] , 200);
    }//End filterDailySale


    /**
     * Product Sales Reports
     */
    public function productWiseSaleReportIndex()
    {
        $data['sales'] = $this->sales;
        $data['products'] = ProductService::all();
        return $this->getSalesTable($data);
    }

    public function productWiseSaleReportFilter(Request $request)
    {
        $data['sales'] = Sale::query()->whereProductServiceId($request->get('product_id'))->whereBetween('created_at' , [$request->from_date , $request->to_date])->orderByDesc('created_at')->paginate(15);
        $view = view('partials.daily_sales' , $data)->render();
        return response()->json(['status' => true , 'view' => $view] , 200);
    }



    /**
     * Customer Sales Reports
     */

    public function customerWiseSaleReportIndex()
    {
        $data['sales'] = $this->sales;
        $data['customers'] = $this->customers;
        return $this->getSalesTable($data);
    }


    public function customerWiseSaleReportFilter(Request $request)
    {
        $data['sales'] = Sale::query()->whereCustomerId($request->get('customer_id'))->whereBetween('created_at' , [$request->from_date , $request->to_date])->orderByDesc('created_at')->paginate(15);
        $view = view('partials.daily_sales' , $data)->render();
        return Self::getJsonResponse(true , $view);
    }



    /**
     * Customer Statement
     */

    public function customerStatementReportIndex()
    {
        $data['invoices'] = Sale::orderByDesc('created_at')->paginate(15);
        $data['request_segment'] = FacadesRequest::segment(1);
        $data['customers'] = $this->customers;
        $data['form_action'] = route('report.customer_statement_filter');
        return view('report.customer-statement' , $data);
    }

    public function customerStatmentReportFilter(Request $request)
    {
        $data['invoices'] = Sale::whereCustomerId($request->customer_id)->whereBetween('created_at' , [$request->from_date , $request->to_date])->orderByDesc('created_at')->paginate(15);
        $view = view('partials.customer-statement' , $data)->render();
        return Self::getJsonResponse(true , $view);
    }

    /**
     * Customer Ledger
     */

    public function customerLedgerReportIndex()
    {
        $data['request_segment'] = FacadesRequest::segment(1);
        $data['customers'] = $this->customers;
        $data['form_action'] = route('report.customer_ledger_filter');
        return view('report.customer-statement' , $data);
    }


    public function customerLedgerReportFilter(Request $request)
    {
        if($request->from_date == $request->to_date)
        {
            $data['sales'] = Sale::query()->whereCustomerId($request->get('customer_id'))->where('created_at' , $request->from_date)->orderByDesc('created_at')->paginate(15);
        }else{
            $data['sales'] = Sale::query()->whereCustomerId($request->get('customer_id'))->whereBetween('created_at' , [$request->from_date , $request->to_date])->orderByDesc('created_at')->paginate(15);
        }
        $view = view('partials.customer-ledger' , $data)->render();
        return Self::getJsonResponse(true , $view);
    }


    /**
     * Vat Report
     */

    public function vatReportIndex()
    {
        $data['sales'] = Sale::orderByDesc('created_at')->paginate(15);
        $data['request_segment'] = FacadesRequest::segment(1);
        return view('report.vat' , $data);
    }


    public function vatReportFilter(Request $request)
    {
        if($request->from_date == $request->to_date){
            $data['sales'] = Sale::query()->whereBetween('created_at' , $request->from_date)->orderByDesc('created_at')->paginate(15);
        }else{
            $data['sales'] = Sale::query()->whereBetween('created_at' , [$request->from_date , $request->to_date])->orderByDesc('created_at')->paginate(15);
        }
        $view = view('partials.vat' , $data)->render();
        return Self::getJsonResponse(true , $view);
    }




    /**
     * Return Sales Table
     */

    public function getSalesTable($data)
    {
        $data['request_segment'] = FacadesRequest::segment(1);
        return view('report.daily_sale' ,  $data);
    }

    public static function getJsonResponse($status , $view)
    {
        $code = $status ? 200 : 419;
        return response()->json(['status' => $status , 'view' => $view] , $code);
    }




    /**
     * Customer Ledger report print
     */
    public function printCustomerLedgerReport(Request $request)
    {
        if($sales_ids =  $request->ids)
        {
            $data['invoices'] = Sale::query()->whereIn('id' , $sales_ids)
                                ->with('customer')
                                ->orderByDesc('createD_at')->get();
            $data['number_formatter'] = new NumberFormatter('en' , NumberFormatter::SPELLOUT);
            $pdf = PDF::loadView('vendor.invoices.templates.customer-ledeger' , $data);
            return $pdf->downloa(\Auth::user()->invoiceNumberFormat($data['invoices'][0]->invoice_id.'.pdf'));
        }else{
            return back();
        }
    }

}
