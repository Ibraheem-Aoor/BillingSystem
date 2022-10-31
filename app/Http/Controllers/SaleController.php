<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\PriceList;
use App\Models\ProductService;
use App\Models\Sale;
use App\Models\Tax;
use Illuminate\Http\Request;
use NumberFormatter;
use Stripe\Product;
use Throwable;
use PDF;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $products , $customers , $drivers , $vat , $cars;
     public function __construct()
     {
        $this->products = ProductService::all();
        $this->customers  = Customer::all();
        $this->drivers = Driver::all();
        $this->vat =  Tax::first()->rate;
        $this->cars = Car::all();
     }
    public function index()
    {
        $data['sales'] = Sale::all();
        return view('sales.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = $this->products;
        $data['customers'] = $this->customers;
        $data['cars'] = $this->cars;
        $data['drivers'] = $this->drivers;
        $data['vat'] = $this->vat;
        return view('sales.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->toArray();
        Sale::create($data);
        return redirect()->back()->with('success' , 'Sale Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['sale'] = Sale::findOrFail($id);
        $data['products'] = $this->products;
        $data['customers'] = $this->customers;
        $data['cars'] = $this->cars;
        $data['drivers'] = $this->drivers;
        return view('sales.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, $id)
    {
        $data = $request->toArray();
        $sale = Sale::findOrFail($id);
        $sale->update($data);
        return redirect(route('sale.index'))->with('success' , __('Sale Updated Successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::where('id' , $id)->delete();
        return redirect(route('sale.index'))->with('success' , __('Sale Deleted Successfully'));
    }


    public function getProductPrice(Request $request)
    {
        try{
            $price_list = PriceList::where([ ['product_service_id' , $request->product_id] , ['customer_id'  , $request->customer_id]])->first();
            $rate = $price_list->selling_price;
            return response()->json(['status' => true , 'rate' => $rate] , 200);
        }catch(Throwable $e){
            return response()->json(['status' => false ] , 419);
        }
    }


    public function printSale($id)
    {
        $data['invoice'] = Sale::findOrFail($id);
        $data['invoice_number'] = \Auth::user()->invoiceNumberFormat($data['invoice']->id);
        $data['number_formatter'] = new NumberFormatter('en' , NumberFormatter::SPELLOUT);
        $pdf = PDF::loadView('vendor.invoices.templates.default_copy_2' , $data);
        return $pdf->stream($data['invoice_number']);
    }

    public function bulk_print(Request $request)
    {
        if($request->id)
        {
        $data['invoices'] = Sale::query()->whereIn('id' , $request->id)->get();
        $data['subtotal_vat'] = $data['invoices']->sum('vat');
        $data['invoice_number'] = \Auth::user()->invoiceNumberFormat(@$data['invoices'][0]->id);
        $data['number_formatter'] = new NumberFormatter('en' , NumberFormatter::SPELLOUT);
        $pdf = PDF::loadView('vendor.invoices.templates.default_copy_3' , $data);
        return $pdf->stream($data['invoice_number']);
        }
        return back();
    }
}
