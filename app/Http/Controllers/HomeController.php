<?php

namespace App\Http\Controllers;

use App\Part;
use App\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function chooseVehicle()
    {
        $vehicles = Vehicle::all();
        $years = [];
        $models = $vehicles->pluck('model');
        $makes = [];

        return view('user.chooseVehicle',compact('years','makes','models'));
    }

    public function showVehicle(Request $request)
    {
        $year = $request['year'];
        $model = $request['model'];
        $make = $request['make'];

        $vehicle = Vehicle::where([
            ['model',$model],
            ['make',$make],
            ['year',$year]
        ])->get();


        return view('user.showVehicle',['vehicle'=>$vehicle[0]]);
    }

    public function getMake(Request $request)
    {
        $model = $request['model'];
        $make = Vehicle::where('model',$model)->get();
        $make = $make->pluck('make');
        return response($make,200);
    }

    public function getYear(Request $request)
    {
        $model = $request['model'];
        $make = $request['make'];
        $year = Vehicle::where([
            ['model',$model],
            ['make',$make]
        ])->get();
        $year = $year->pluck('year');
        return response($year,200);
    }

    public function parts(Vehicle $vehicle){

        $parts = $vehicle->parts()->get();

        return view('user.showParts',compact('parts'));
    }

    public function showPart(Request $request)
    {
        $part = Part::find($request->part);

        return view('user.showPart',compact('part'));
    }

}
