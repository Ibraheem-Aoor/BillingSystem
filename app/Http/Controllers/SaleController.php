<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\ProductService;
use App\Models\Sale;
use Illuminate\Http\Request;
use Stripe\Product;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $products;
     public function __construct()
     {
        $this->products = ProductService::all();
     }
    public function index()
    {
        $data['sales'] = Sale::paginate(15);
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
}
