<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Part;
use App\Question;
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
        $request->validate([
            'model' => 'required',
            'make' => 'required',
            'year' => 'required',

        ]);
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

    public function addQuestion(){
        return view('user.add-question');
    }

    public function storeQuestion(Request $request){
        $request->validate([
            'question' => 'required',
        ]);
        $q = new Question();
        $q->question = $request['question'];
        $q->user_id = auth()->user()->id;
        $q->save();
        return redirect()->route('home');
    }

    public function storeAnswer(Request $request){
        $request->validate([
            'answer' => 'required',
        ]);
        $q = new Answer();
        $q->answer = $request['answer'];
        $q->user_id = auth()->user()->id;
        $q->question_id = $request['question'];
        $q->save();
        return response()->json('success',200);
    }

    public function questions(){
        $questions = Question::all();

        return view('user.questions',compact('questions'));
    }

    public function questionAnswers(Question $question){
        $answers = $question->answers()->orderBy('created_at','desc')->get();

        return view('user.answers',compact('answers','question'));
    }

}
