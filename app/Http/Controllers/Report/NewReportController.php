<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewReportController extends Controller
{
    public function dailySaleIndex()
    {
        $data['sales'] = Sale::orderByDesc('created_at')->paginate(15);
        return view('report.daily_sale' , $data);
    }//End index

    public function filterDailySale(Request $request)
    {
        $data['sales'] = Sale::where('created_at' , 'like' , '%'.$request->date.'%')->orderByDesc('created_at')->paginate(15);
        $view = view('partials.daily_sales' , $data)->render();
        return response()->json(['status' => true , 'view' => $view] , 200);
    }//End filterDailySale


}
