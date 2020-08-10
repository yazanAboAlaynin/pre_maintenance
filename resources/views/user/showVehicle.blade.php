@extends('layouts.show')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <img src="/storage/{{ $vehicle->image }}" class="" width="100%" height="500px"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 style="color: white">{{ $vehicle->name }}</h1>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-4">
                <h4 style="color: white">
                    Vehicle make:
                    <span style="color: red">
                        {{ $vehicle->make }}
                    </span>
                </h4>
            </div>
            <div class="col-md-4">
                <h4 style="color: white">
                    Vehicle model:
                    <span style="color: red">
                        {{ $vehicle->model }}
                    </span>
                </h4>
            </div>
            <div class="col-md-4">
                <h4 style="color: white">
                    Vehicle year:
                    <span style="color: red">
                        {{ $vehicle->year }}
                    </span>
                </h4>

            </div>


        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="list-group text-md-right">
                    <a class="list-group-item list-group-item-action" style="background-color: #595959; color: white"
                       href="#">
                        <h5>ايجاد اقتراحات لحل المشاكل معينة لديك تظهر في مركبتك </h5></a>

                    <a class="list-group-item list-group-item-action " style="background-color: #595959; color: white"
                       href="#">
                        <h5>جعل سيارتك تمشي مسافة 200 الف كيلومتر فما فوق دون ظهور مشاكل مفاجئة</h5></a>

                    <a class="list-group-item list-group-item-action" style="background-color: #595959; color: white"
                       href="{{ route('parts',$vehicle) }}">
                        <h5>اختيار قطع التبديل المناسبة لسيارتك لتعمل بقتصادية وكفائة عالية</h5></a>

                    <a class="list-group-item list-group-item-action " style="background-color: #595959; color: white"
                       href="{{ $vehicle->guide_url }}">
                        <h5>تنصيب دليل المستخدم الخاص بسيارتك</h5></a>

                    <a class="list-group-item list-group-item-action" style="background-color: #595959; color: white"
                       href="#">
                        <h5>معرفة أوقات تبديل المناسبة لكل جزء من سيارتك</h5></a>

                    <a class="list-group-item list-group-item-action " style="background-color: #595959; color: white"
                       href="#">
                        <h5>قم بالإصلاح بنفسك</h5></a>

                    <a class="list-group-item list-group-item-action" style="background-color: #595959; color: white"
                       href="#">
                        <h5> قم بتقييم سيارتك من حيث الجاهزية</h5></a>

                </div>
            </div>


        </div>
    </div>
@endsection
