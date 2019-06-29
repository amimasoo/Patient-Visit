@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow: 5px 10px 35px #3e3e3e;">
                    <div class="card-header bg-primary text-white" style="float: right;text-align: right">{{ __('ویرایش مشخصات بیمار') }}</div>
                    <div class="card-body" style="float: right;text-align: right">
                        @if(Session::has('message'))
                            <p class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <form method="post" action="">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input value="{{$patient->firstName}}" style="text-align: right" id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" required autofocus>

                                    @if ($errors->has('firstName'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="firstName" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right">{{ __('نام') }}</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{$patient->lastName}}" required autofocus>

                                    @if ($errors->has('lastName'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="lastName" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right">{{ __('نام خانوادگی') }}</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="nationalNumber" type="number" class="form-control{{ $errors->has('nationalNumber') ? ' is-invalid' : '' }}" name="nationalNumber" value="{{$patient->nationalNumber}}" required autofocus>

                                    @if ($errors->has('nationalNumber'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nationalNumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="nationalNumber" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right">{{ __('شماره ملی') }}</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">

                                    <input style="text-align: right" id="phoneNumber" type="number" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phoneNumber" value="{{$patient->phoneNumber}}" required autofocus>

                                    @if ($errors->has('phoneNumber'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="phoneNumber" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right">{{ __('شماره تلفن همراه') }}</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="height" type="number" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{$patient->height}}" required autofocus>

                                    @if ($errors->has('height'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="height" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right;direction: rtl">{{ __('قد (به سانتی متر)') }}</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="weight" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight"  value="{{$patient->weight}}" required>

                                    @if ($errors->has('weight'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="weight" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right">{{ __('وزن') }}</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="BMI" type="hidden" class="form-control{{ $errors->has('BMI') ? ' is-invalid' : '' }}" name="BMI" value="{{$patient->BMI}}" required>

                                    @if ($errors->has('BMI'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('BMI') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{--<label for="BMI" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right;direction: rtl">{{ __('محاسبه BMI ') }}</label>--}}
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" onclick="add_number()" class="btn btn-block bg-primary text-white" name="clickbtn" value="Display Result">
                                        {{ __('ویرایش اطلاعات بیمار') }}
                                    </button>
                                </div>
                                <a class="btn btn-block col-md-3 text-white" href="/patients" style="background-color: #4285f4; padding: 10px; margin-left: 30px">لیست بیمار ها</a>
                            </div>
                        </form>
                        @if($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white" style="float: right;text-align: right">{{ __('ویرایش تاریخ ویزیت بیمار') }}</div>
                            <div class="card-body">
                                <form method="post" action="">
                                    @csrf
                                    @foreach($patient->visits as $visit)
                                    <div class="form-group row">
                                        {{--<button type="submit" class="btn btn-sm bg-primary text-white" name="clickbtn" value="Display Result" style="float: left;display: inline-block">--}}
                                            {{--<i class="fas fa-check"></i>--}}
                                        {{--</button>--}}
                                        <a href="{{$visit->id}}" class="btn btn-sm btn-primary">
                                            <i href="" class="fas fa-check"></i>
                                        </a>
                                        <div class="col-md-6">
                                            {{--<input style="text-align: right; display: inline-block" id="nationalNumber" type="number" class="form-control{{ $errors->has('nationalNumber') ? ' is-invalid' : '' }}" name="nationalNumber" required autofocus>--}}
                                        <input style="text-align: right" id="date" type="date" class="form-control{{$errors->has('date') ? ' is-invalid' : ''}}" name="date" value="{{$visit->date}}" required>
                                            @if ($errors->has('nationalNumber'))
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $errors->first('nationalNumber') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <label for="nationalNumber" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right; margin-left: 45px">{{ __('تاریخ ویزیت') }}</label>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="card-body">
                    @if(Session::has('message'))
                        <p class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <form method="post" action="">
                        @csrf

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input style="text-align: right" id="date" type="date" class="form-control{{$errors->has('date') ? ' is-invalid' : ''}}" name="date" value="{{$visit->date}}" required>
                                </div>
                                <label for="date" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right" >{{ __('تاریخ ویزیت را انتخاب کنید') }}</label>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn bg-primary text-white" name="clickbtn" value="Display Result">
                                    {{ __('ویرایش') }}
                                </button>
                            </div>

                    </form>
                </div>--}}
            </div>
        </div>
    </div>

    <script>

        function add_number() {

            var height = document.getElementById("height").value;
            var weight = document.getElementById("weight").value;
            var heightToMeter= height/100;
            var height2 = heightToMeter * heightToMeter;
            var result = parseFloat(weight / height2 );

            document.getElementById("BMI").value = result;
        }

    </script>

@endsection