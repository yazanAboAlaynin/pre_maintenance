@extends('layouts.show')

@section('content')
<div class="container-fluid" style="margin-left: 20px">
    <div class="row">
        <div class="col-6">
            <div class="list-group text-md-right">
                <a class="list-group-item list-group-item-action list-group-item-secondary" href="#">
                    <h5>ايجاد اقتراحات لحل المشاكل معينة لديك تظهر في مركبتك </h5> </a>

                <a class="list-group-item list-group-item-action " href="#">
                    <h5>جعل سيارتك تمشي مسافة 200 الف كيلومتر فما فوق دون ظهور مشاكل مفاجئة</h5> </a>

                <a class="list-group-item list-group-item-action list-group-item-secondary" href="{{ route('parts',$vehicle) }}">
                    <h5>اختيار قطع التبديل المناسبة لسيارتك لتعمل بقتصادية وكفائة عالية</h5>   </a>

                <a class="list-group-item list-group-item-action " href="{{ $vehicle->guide_url }}">
                    <h5>تنصيب دليل المستخدم الخاص بسيارتك</h5> </a>

                <a class="list-group-item list-group-item-action list-group-item-secondary" href="#">
                    <h5>معرفة أوقات تبديل المناسبة لكل جزء من سيارتك</h5>  </a>

                <a class="list-group-item list-group-item-action " href="#">
                    <h5>قم بالإصلاح بنفسك</h5> </a>

                <a class="list-group-item list-group-item-action list-group-item-secondary" href="#">
                    <h5> قم بتقييم سيارتك من حيث الجاهزية</h5></a>

            </div>
        </div>
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


    </div>
</div>
@endsection
