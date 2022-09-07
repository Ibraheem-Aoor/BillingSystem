<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['suppliers'] = Supplier::paginate(15);
        return view('supplier.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
        $validator = Validator::make($data , ['name' => 'required']);
        if($validator->fails())
            return redirect(route('supplier.index'))->with('error' , __('Supplier Name Required'));
        Supplier::create($data);
        return redirect(route('supplier.index'))->with('success' , __('Supplier Created Successfully'));
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
        $data['supplier'] =  Supplier::findOrFail($id);
        return view('supplier.edit' , $data);
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
        $validator = Validator::make($data , ['name' => 'required']);
        if($validator->fails())
            return redirect(route('car.index'))->with('error' , __('Supplier No Required'));
         $supplier = Supplier::find($id);
        $supplier->update($data);
        return redirect(route('supplier.index'))->with('success' , __('Supplier Updated Successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::where('id' , $id)->delete();
        return redirect(route('supplier.index'))->with('success' , __('Supplier Deleted Successfully'));

    }
}
