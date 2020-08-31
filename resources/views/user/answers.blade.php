@extends('layouts.app')

@section('content')
    <div class="container" id="main">
        <h1 >Question: {{$question->question}}</h1>
        <hr/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark" style="color: white">
                        Add your Answer here:

                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="answer" rows="4" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer"  required autocomplete="answer" autofocus>

                                </textarea>

                                @error('answer')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a id="button" class="btn btn-outline-dark w-100" onclick="answer({{$question->id}})">Answer</a>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <br/>
        @foreach($answers as $answer)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark" style="color: white">
                            answer from: {{$answer->user->name}}
                            <span style="float: right">{{$answer->created_at}}</span>
                        </div>

                        <div class="card-body">
                            {{$answer->answer}}

                        </div>

                    </div>

                </div>
            </div>
            <br/>
        @endforeach
    </div>

    <script>
        function answer(question){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var aswr = document.getElementById('answer').value;
            $.ajax({
                url: "{{route('store.answer')}}",
                type: 'post',
                data: {
                    'question': question,
                    'answer': aswr
                },
                success: function(result){
                 //   alert('your answer added successfully');
                    $("#main"). load(" #main > *");
                }});
        }
    </script>
@endsection
