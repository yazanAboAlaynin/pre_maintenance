@extends('layouts.show')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1> <span style="color: yellow; font-family: Arial, Helvetica, sans-serif" >{{ $part->name }}</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-white ">
            <div class="row text-center" style="font-size: 30px">
                <div class="col-md-12">
                    <span class="">Details</span>
                </div>
            </div>

            <hr style="border: 1px solid red;"/>
            <div class="" style="margin-bottom: 30px">
                <h4>Date to change: <span style="color: yellow">{{ $part->date_to_change }}</span></h4>
            </div>
            <div>
                <h4>Markets sell this part:</h4>
                <h5> <span style="color: yellow"><p>{{ $part->markets }}</p></span></h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0">


                <div class="card-body bg-dark ">
                    <img src="/storage/{{ $part->image }}" class="center" width="500px" height="400px"/>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-white">
            <div class="row text-center" style="font-size: 30px">
                <div class="col-md-12">
                    <span class="">Description</span>
                </div>
            </div>
            <hr style="border: 1px solid red;"/>
            <div class="" style="margin-bottom: 30px">
                <h5><span style="color: white">{{ $part->description }}</span></h5>
            </div>

        </div>
    </div>

</div>
@endsection
