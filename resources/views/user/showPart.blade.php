@extends('layouts.show')

@section('content')
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1> <span style="color: yellow; font-family: Arial, Helvetica, sans-serif" >{{ $part->name }}</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-white ">
            <div class="row text-center" style="font-size: 30px">
                <div class="col-md-12">
                    <span class="">المحال التي تبيع القطعة</span>
                </div>
            </div>

            <hr style="border: 1px solid red;"/>
            <div>
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
                    <span class="">الوصف</span>
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
