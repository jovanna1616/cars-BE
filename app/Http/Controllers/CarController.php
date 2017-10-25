<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::getCars();
        return $cars;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $car = new Car();
        $rules = Car::STORE_RULES;
        $request->validate($rules);

        $car->mark = $request->input('mark');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->max_speed = $request->input('max_speed');
        $car->is_automatic = $request->input('is_automatic');
        $car->engine = $request->input('engine');
        $car->number_of_doors = $request->input('number_of_doors');
        
        $car->save();
        return $car;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $car = Car::findOrFail($id);
        $rules = Car::STORE_RULES;

        $car->mark = $request->input('mark');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->max_speed = $request->input('max_speed');
        $car->is_automatic = $request->input('is_automatic');
        $car->engine = $request->input('engine');
        $car->number_of_doors = $request->input('number_of_doors');

        $request->validate($rules);
        $car->save();
        return $car;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return $car;
    }
}
