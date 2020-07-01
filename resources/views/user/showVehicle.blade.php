@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-left: 20px">
    <div class="row">

        <div class="col-md-4.5">
            <div class="card">
                <div class="card-header"><img src="/storage/{{ $vehicle->image }}" class="" width="500px" height="400px"/></div>

                <div class="card-body">
                    <h4>Vehicle make: <span style="color: blue">{{ $vehicle->make }}</span></h4>
                    <h4>Vehicle model: <span style="color: blue">{{ $vehicle->model }}</span></h4>
                    <h4>Vehicle year: <span style="color: blue">{{ $vehicle->year }}</span></h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="list-group">
                <a class="list-group-item list-group-item-action list-group-item-primary" href="#">
                    1- Find solutions for problems appears in your vehicle</a>

                <a class="list-group-item list-group-item-action " href="#">
                    2- Make your vehicle walk for more than 200 thousand km without any problems</a>

                <a class="list-group-item list-group-item-action list-group-item-primary" href="{{ route('parts',$vehicle) }}">
                    3- Choose the right spare parts for your vehicle to operate with high efficiency and economy  </a>

                <a class="list-group-item list-group-item-action " href="#">
                    4- Install your car user guide</a>

                <a class="list-group-item list-group-item-action list-group-item-primary" href="#">
                    5- Find out the appropriate switching times for each part of your vehicle</a>

                <a class="list-group-item list-group-item-action " href="#">
                    6- Fix it yourself</a>

                <a class="list-group-item list-group-item-action list-group-item-primary" href="#">
                    7- Evaluate your vehicle for availability</a>

            </div>
        </div>

    </div>
</div>
@endsection
