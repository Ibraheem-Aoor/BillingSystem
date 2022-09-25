<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\PriceList;
use App\Models\ProductService;
use App\Models\Supplier;
use App\Models\Tax;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Product;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['lists'] = PriceList::paginate(15);
        return view('price_list.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['customers'] = Customer::all();
        $data['products'] = ProductService::all();
        $data['vat'] = Tax::first()->rate;
        return view('price_list.create' , $data);
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
        @$data['vat'] == null ? $data['vat'] = 0 : '';
        PriceList::create($data);
        return redirect(route('price-list.index'))->with('success' , __('Price List Created Successfully'));
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
        $data['customers'] = Customer::all();
        $data['products'] = ProductService::all();
        $data['list'] = PriceList::findOrFail($id);
        return view('price_list.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->toArray();
        $price_list = PriceList::find($id);
        $price_list->update($data);
        return redirect(route('price-list.index'))->with('success' , __('Price List Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PriceList::where('id' , $id)->delete();
        return redirect(route('price-list.index'))->with('success' , __('Price List Deleted Successfully'));

    }
}
