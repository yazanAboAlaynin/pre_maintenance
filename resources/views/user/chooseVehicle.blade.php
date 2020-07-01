@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Choose your vehicle') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('show.vehicle') }}">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group row">

                                        <div class="col-md-12 disabled">
                                            <select  name="model" id="model" class="form-control"  onchange="enable('make')">
                                                <option value="model">model</option>
                                                @foreach($models as $model)
                                                    <option value="{{ $model }}">{{ $model }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <select  name="make" id="make" class="form-control" disabled  onclick="enable('year')">
                                                <option value="year" >make</option>
                                                @foreach($makes as $make)
                                                    <option value="{{ $make }}">{{ $make }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group row">

                                        <div class="col-md-12 ">
                                            <select  name="year" id="year" class="form-control" disabled>
                                                <option value="volvo">Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Next') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                         </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    function view() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                alert(this.responseText);

            }
        };
        var year = document.getElementById("year").value;
        var make = document.getElementById("make").value;
        var model = document.getElementById("model").value;

        xhttp.open("get", "{{ route("show.vehicle") }}?year=" + year +"&&make="+make+"&&model="+model, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    }

    function enable(id) {
        var xhttp = new XMLHttpRequest(), response;
        if(id == 'make') {

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {

                    var makes = JSON.parse(xhttp.responseText);
                    var data = makes;
                    makes = "";
                    $.each(data, function (v) {

                        var val = data[v];

                        makes += "<option value='" + val + "'>" + val + "</option>";
                    });
                    $('#make').html(makes);

                }
            };
            var model = document.getElementById("model").value;

            xhttp.open("get", "{{ route("getMake") }}?model=" + model, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        }
            else{

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200 ) {

                        var makes = JSON.parse(xhttp.responseText);
                        var data = makes
                        makes = "";
                        $.each(data, function(v) {

                            var val = data[v];

                            makes += "<option value='" + val + "'>" + val + "</option>";
                        });
                        $('#year').html(makes);

                    }
                };
                var model = document.getElementById("model").value;
                var make = document.getElementById("make").value;

                xhttp.open("get", "{{ route("getYear") }}?model="+model+"&&make="+make, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send();

        }
        document.getElementById(id).disabled = false;
    }
</script>
@endsection
