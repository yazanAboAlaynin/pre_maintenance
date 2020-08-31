@extends('layouts.app')

@section('content')
<div class="container">
    <h1 >Discussion</h1>
    <hr/>
    @foreach($questions as $question)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark" style="color: white">
                    question from: {{$question->user->name}}
                    <span style="float: right">{{$question->answers->count()}} Answers</span>
                </div>

                <div class="card-body">
                    {{$question->question}}

                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a class="btn btn-outline-dark w-100" href="{{Route('question.answers',$question)}}">Answer</a>
                </div>
            </div>
        </div>
    </div>

    <br/>
    @endforeach

</div>
@endsection
