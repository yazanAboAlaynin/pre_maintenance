@extends('layouts.show')

@section('content')
    <div id="carouselExampleCaptions" class="alert alert-dark carousel slid border-0" style="background-color: black;" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" style="background-color: black">
            <div class="carousel-item active">
                <img src="/images/cover1.jpg" width="100%" height="380px"/>

            </div>
            <div class="carousel-item">
                <img src="/images/cover2.jpg" width="100%" height="380px"/>

            </div>
            <div class="carousel-item">
                <img src="/images/cover3.jpg" width="100%" height="380px"/>

            </div>
            <div class="carousel-item">
                <img src="/images/cover4.jpg" width="100%" height="380px"/>

            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container" >
        <div class="row justify-content-center" >
            <div class="col-md-12">
                <div class="card " style="background-color: black">


                    <div class="card-body">
                        <form method="get" action="{{ route('show.vehicle') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-1" style="color: white">{{ __('اختر مركبتك') }}</div>
                                <div class="col-md-2">
                                    <div class="form-group row">

                                        <div class="col-md-12" >
                                            <select  name="model" id="model" class="form-control border-dark" style="background-color: #595959; color: white" onchange="enable('make')" required>
                                                <option value="model" style="color: white">Model</option>
                                                @foreach($models as $model)
                                                    <option value="{{ $model }}" style="color: white">{{ $model }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <select  name="make" id="make" class="form-control border-dark" style="background-color: #595959; color: white" disabled  onclick="enable('year')" required>
                                                <option value="make" style="color: white">make</option>
                                                @foreach($makes as $make)
                                                    <option value="{{ $make }}" style="color: white">{{ $make }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group row">

                                        <div class="col-md-12 ">
                                            <select  name="year" id="year" class="form-control border-dark" style="background-color: #595959; color: white" disabled required>
                                                <option value="year">Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-danger " type="submit">ابحث</button>
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
                        var data = makes;
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
