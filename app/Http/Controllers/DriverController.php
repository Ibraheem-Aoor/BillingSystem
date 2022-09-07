<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['drivers'] = Driver::paginate(15);
        return view('driver.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
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
            return redirect(route('driver.index'))->with('error' , __('Driver Name Required'));
        Driver::create($data);
        return redirect(route('driver.index'))->with('success' , __('Driver Created Successfully'));
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
        $data['driver'] =  Driver::findOrFail($id);
        return view('driver.edit' , $data);
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
            return redirect(route('car.index'))->with('error' , __('Driver No Required'));
         $driver = Driver::find($id);
        $driver->update($data);
        return redirect(route('driver.index'))->with('success' , __('Driver Updated Successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Driver::where('id' , $id)->delete();
        return redirect(route('driver.index'))->with('success' , __('Driver Deleted Successfully'));

    }
}
