<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ProductService;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Stripe\Product;

class NewReportController extends Controller
{

    private  $sales;
    public function __construct()
    {
        $this->sales = Sale::orderByDesc('created_at')->paginate(15);
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
        $data['customers'] = Customer::all();
        return $this->getSalesTable($data);
    }


    public function customerWiseSaleReportFilter(Request $request)
    {
        $data['sales'] = Sale::query()->whereCustomerId($request->get('customer_id'))->whereBetween('created_at' , [$request->from_date , $request->to_date])->orderByDesc('created_at')->paginate(15);
        $view = view('partials.daily_sales' , $data)->render();
        return response()->json(['status' => true , 'view' => $view] , 200);
    }



    /**
     * Return Sales Table
     */

    public function getSalesTable($data)
    {
        $data['request_segment'] = FacadesRequest::segment(1);
        return view('report.daily_sale' ,  $data);
    }

}
