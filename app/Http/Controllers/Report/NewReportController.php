<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Product;

class NewReportController extends Controller
{

    public $sales;
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
        return view('report.daily_sale' , $data);
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
        return view('report.daily_sale' ,  $data);
    }

    public function productWiseSaleReportFilter(Request $request)
    {
        $data['sales'] = Sale::query()->whereProductServiceId($request->get('product_id'))->whereBetween('created_at' , [$request->from_date , $request->to_date])->orderByDesc('created_at')->paginate(15);
        $view = view('partials.daily_sales' , $data)->render();
        return response()->json(['status' => true , 'view' => $view] , 200);
    }

}
