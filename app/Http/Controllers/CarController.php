<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cars'] = Car::all();
        return view('car.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
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
        $validator = Validator::make($data , ['no' => 'required']);
        if($validator->fails())
            return redirect(route('car.index'))->with('error' , __('Car No Required'));
        Car::create($data);
        return redirect(route('car.index'))->with('success' , __('Car Created Successfully'));
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
        $data['car'] =  Car::findOrFail($id);
        return view('car.edit' , $data);
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
        $validator = Validator::make($data , ['no' => 'required']);
        if($validator->fails())
            return redirect(route('car.index'))->with('error' , __('Car No Required'));
         $car = Car::find($id);
        $car->update($data);
        return redirect(route('car.index'))->with('success' , __('Car Updated Successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::where('id' , $id)->delete();
        return redirect(route('car.index'))->with('success' , __('Car Deleted Successfully'));

    }
}
