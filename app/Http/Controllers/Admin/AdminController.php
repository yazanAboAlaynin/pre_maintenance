<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Part;
use App\Vehicle;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.home');
    }

    public function addVehicle()
{
    return view('admin.addVehicle');
}

    public function storeVehicle(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'trim' => 'required',
            'style' => 'required',
            'guide_url' => 'required',
        ]);

        if ($files = $request->file('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1500, 1500);
            $image->save();
        }

        $v = new Vehicle();
        $v->name = $data['name'];
        $v->year = $data['year'];
        $v->make = $data['make'];
        $v->model = $data['model'];
        $v->image = $imagePath;
        $v->trim = $data['trim'];
        $v->style = $data['style'];
        $v->guide_url = $data['guide_url'];
        $v->save();

        return redirect()->route('admin.add.part',['vehicle' => $v]);

    }

    public function addPart(Request $request)
    {
        $vehicle = $request['vehicle'];
        return view('admin.addPart',compact('vehicle'));
    }

    public function storePart(Request $request,Vehicle $vehicle)
    {
        $data = $request->validate([
            'name' => 'required',
            'date_to_change' => 'required',
            'description' => 'required',
            'markets' => 'required',
            'image' => 'required',
        ]);

        if ($files = $request->file('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1500, 1500);
            $image->save();
        }

        $p = new Part();
        $p->name = $data['name'];
        $p->vehicle_id = $vehicle->id;
        $p->date_to_change = $data['date_to_change'];
        $p->description = $data['description'];
        $p->markets = $data['markets'];
        $p->image = $imagePath;

        $p->save();

        return redirect()->route('admin.add.part',['vehicle' => $vehicle]);

    }

    public function vehicles(Request $request){

        if($request->ajax())
        {
            $data = Vehicle::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" 
                    class="edit btn btn-primary btn-sm" onclick=update('.$data->id.')>Edit</button>';
                    $button .= '&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" 
                    class="delete btn btn-danger btn-sm" onclick=del('.$data->id.')>Delete</button><br/>';
                    $button .= '<br/><button type="button" name="delete" id="'.$data->id.'" 
                    class="delete btn btn-success btn-sm" onclick=parts('.$data->id.')>Parts</button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.vehicles');

    }

    public function updateVehicle($id){
        $vehicle = Vehicle::find($id);
        return view('admin.vehicleEdit',compact('vehicle'));
    }

    public function vehicleEdit(Request $request,$id)
    {
        $data = $request->validate([
            'name' => 'required',
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'trim' => 'required',
            'style' => 'required',
            'guide_url' => 'required',
        ]);

        $v = Vehicle::find($id);
        $v->name = $data['name'];
        $v->year = $data['year'];
        $v->make = $data['make'];
        $v->model = $data['model'];
        $v->trim = $data['trim'];
        $v->style = $data['style'];
        $v->guide_url = $data['guide_url'];
        $v->save();
        return redirect('admin/vehicles');
    }

    public function deleteVehicle(Request $request){

        $data = Vehicle::findOrFail($request->id);
        $data->delete();

        return;
    }

    public function vehicleParts(Request $request,$id)
    {

        if($request->ajax())
        {
            $data = Vehicle::find($id)->parts()->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $url = route('admin.part.update',$data->id);
                    $button = '<a href="'.$url.'" name="edit" id="'.$data->id.'" 
                    class="edit btn btn-primary btn-sm" onclick=update('.$data->id.')>Edit</a>';
                    $button .= '&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" 
                    class="delete btn btn-danger btn-sm" onclick=del('.$data->id.')>Delete</button><br/>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.vehicleParts',compact('id'));

    }

    public function partUpdate($id){
        $part = Part::find($id);
        return view('admin.partEdit',compact('part'));
    }

    public function partEdit(Request $request,$id)
    {
        $data = $request->validate([
            'name' => 'required',
            'date_to_change' => 'required',
            'description' => 'required',
            'markets' => 'required',
        ]);

        $p = Part::find($id);
        $p->name = $data['name'];
        $p->date_to_change = $data['date_to_change'];
        $p->description = $data['description'];
        $p->markets = $data['markets'];

        $p->save();
        return redirect('admin/vehicles');
    }

    public function deletePart(Request $request){

        $data = PArt::findOrFail($request->id);
        $data->delete();

        return;
    }
}
