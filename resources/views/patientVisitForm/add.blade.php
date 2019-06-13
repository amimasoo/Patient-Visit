@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow: 5px 10px 35px #3e3e3e;">
                    <div class="card-header bg-primary text-white" style="float: right;text-align: right">{{ __('ثبت ویزیت بیمار') }}</div>
                    @if(Session::has('message'))
                        <p class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card-body" style="float: right;text-align: right">
                        <form method="post" action="">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

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
                                    <input style="text-align: right" id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

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
                                    <input style="text-align: right" id="nationalNumber" type="number" class="form-control{{ $errors->has('nationalNumber') ? ' is-invalid' : '' }}" name="nationalNumber" value="{{ old('nationalNumber') }}" required autofocus>

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

                                    <input style="text-align: right" id="phoneNumber" type="number" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phoneNumber" value="{{ old('phoneNumber') }}" required autofocus>

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
                                    <input style="text-align: right" id="height" type="number" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" required autofocus>

                                    @if ($errors->has('height'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="height" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right">{{ __('قد (به سانتی متر)') }}</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="weight" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required>

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
                                    <input style="text-align: right" id="BMI" type="hidden" class="form-control{{ $errors->has('BMI') ? ' is-invalid' : '' }}" name="BMI" value="{{ old('BMI') }}" required>

                                    @if ($errors->has('BMI'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('BMI') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{--<label for="BMI" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right;direction: rtl">{{ __('محاسبه BMI ') }}</label>--}}
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input style="text-align: right" id="date" type="date" class="form-control{{$errors->has('date') ? ' is-invalid' : ''}}" name="date" value="{{old('date')}}" required>
                                </div>
                                <label for="date" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right" >{{ __('تاریخ ویزیت را انتخاب کنید') }}</label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" onclick="add_number()" class="btn btn-block bg-primary text-white" name="clickbtn" value="Display Result" onclick="add_number()">
                                        {{ __('ثبت ویزیت برای بیمار') }}
                                    </button>
                                </div>
                                <a class="btn btn-block col-md-3 text-white" href="/visits" style="background-color: #4285f4; padding: 10px; margin-left: 30px">لیست ویزیت ها</a>
                            </div>
                        </form>
                        @if($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--Enter First Number : <br>
<input type="text" id="Text1" name="TextBox1">
<br>
Enter Second Number : <br>
<input type="text" id="Text2" name="TextBox2">
<br>--}}



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