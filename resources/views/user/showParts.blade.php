
@extends('layouts.show')

@section('content')


    <!-------------------------------             --------------------------------------->
    <section class="featured-categories" style="background-color: black;">
        @if($parts->count() > 0)
            <div class="container card shadow"  style="background-color: #595959;">
                <div class="row" style="background-color: #595959;">
                    @foreach($parts as $part)
                        <div class="col-md-3">
                            <div class="product-top">
                                <a href="{{ route('show.part',['part'=>$part]) }}"> <img src="/storage/{{ $part->image }}" class="d-block w-100"> </a>

                            </div>
                            <div class="product-bottom text-center">
                                <h3>{{ $part->name }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

        @else
            <div class="text-center" style="background-color: black;">

            </div>
            <br/>
            <div class="title-box">

            </div>
            <div class="alert alert-secondary mt-lg-3 ml-lg-3 mr-lg-5 mb-lg-4">

                <h3 class="text-center">
                    No Products Yet.
                </h3>
            </div>

        @endif

    </section>


@endsection