@extends('layouts.admin')

@section('content')
    <div class="container pt-2">

        <div class="row justify-content-center ">
            <div class="col-md-8">

                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">
                        <h1>Edit Vehicle</h1>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.vehicle.edit',$vehicle->id) }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $vehicle->name  }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('year') }}</label>

                                <div class="col-md-6">
                                    <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') ?? $vehicle->year   }}" required autocomplete="year" autofocus>

                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="make" class="col-md-4 col-form-label text-md-right">{{ __('make') }}</label>

                                <div class="col-md-6">
                                    <input id="make" type="text" class="form-control @error('make') is-invalid @enderror" name="make" value="{{ old('make') ?? $vehicle->make   }}" required autocomplete="make" autofocus>

                                    @error('make')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('model') }}</label>

                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') ?? $vehicle->model   }}" required autocomplete="model" autofocus>

                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="trim" class="col-md-4 col-form-label text-md-right">{{ __('trim') }}</label>

                                <div class="col-md-6">
                                    <input id="trim" type="text" class="form-control @error('trim') is-invalid @enderror" name="trim" value="{{ old('trim') ?? $vehicle->trim   }}" required autocomplete="trim" autofocus>

                                    @error('trim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="style" class="col-md-4 col-form-label text-md-right">{{ __('style') }}</label>

                                <div class="col-md-6">
                                    <input id="style" type="text" class="form-control @error('style') is-invalid @enderror" name="style" value="{{ old('style') ?? $vehicle->style   }}" required autocomplete="style" autofocus>

                                    @error('style')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="guide_url" class="col-md-4 col-form-label text-md-right">{{ __('guide url') }}</label>

                                <div class="col-md-6">
                                    <input id="guide_url" type="text" class="form-control @error('guide_url') is-invalid @enderror" name="guide_url" value="{{ old('guide_url') ?? $vehicle->guide_url  }}" required autocomplete="guide_url" autofocus>

                                    @error('guide_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="form-group text-center">
                                <button class="btn btn-primary"  style="margin-top:10px;width: 30%">Edit Vehicle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
