<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Pilot;
use App\Brand;

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
        public function add(){
        $brand=Brand::all();
        $pilot=Pilot::all();
        return view('pages.add',compact('brand','pilot'));
    }
    public function add_function(Request $request){
        // dd($request -> all());
        $validate=$request -> validate([
            'name'=>'required|string',
            'model'=>'required|string',
            'kW'=>'required|integer',
            'brand_id'=>'required|integer',
            'pilot_id'=>'required|integer',
        ]);
        $brand_id=$request->get('brand_id');

            $brand=Brand::findOrFail($brand_id);
            $car=Car::make($validate);
            // dd($brand->name);
            $car ->brand() -> associate($brand);
            $car ->save();
        // dd($request -> get('pilots_id'));
        $car -> pilots() -> attach($request -> get('pilot_id'));
        $car -> save();
        return redirect()->route('home');

    }
    public function delete($id){
        $car=Car::findorFail($id);
        $car->delete=1;
        $car->save();
        // dd($car);
        return redirect()-> route('home');
    }
        public function edit($id){
        $car=Car::findorFail($id);
        dd($car);
        return view('pages.edit');
    }

}
