@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow: 5px 10px 35px #3e3e3e;">
                    <div class="card-header bg-primary text-white" style="float: right;text-align: right">{{ __('ثبت ویزیت بیمار') }}</div>
                    <div class="card-body" style="float: right;text-align: right">
                        @if(Session::has('message'))
                            <p class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <form method="post" action="searchpatient/addvisit/{{$existing_patient->id}}">
                             @csrf
                            <div class="form-group row">
                                <button type="submit" class="btn btn-sm bg-primary text-white" name="clickbtn" value="Display Result" style="float: left;display: inline-block">
                                    <i href="visit/add?id={{$existing_patient->id}}" class="fas fa-check"></i>
                                </button>
                                {{--<a href="searchpatient/addvisit/{{$existing_patient->id}}" class="btn btn-sm btn-primary">--}}
                                    {{--<i href="" class="fas fa-check"></i>--}}
                                {{--</a>--}}
                                <div class="col-md-5">
                                    {{--<input style="text-align: right; display: inline-block" id="nationalNumber" type="number" class="form-control{{ $errors->has('nationalNumber') ? ' is-invalid' : '' }}" name="nationalNumber" required autofocus>--}}
                                    <input style="text-align: right" id="date" type="date" class="form-control{{$errors->has('date') ? ' is-invalid' : ''}}" name="date" required>
                                    @if ($errors->has('date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                    <input value="{{$existing_patient->firstName}}" style="text-align: right" id="firstName" type="hidden" class="form-control{{$errors->has('firstName') ? ' is-invalid' : ''}}" name="firstName" required>
                                    <input value="{{$existing_patient->lastName}}" style="text-align: right" id="lastName" type="hidden" class="form-control{{$errors->has('lastName') ? ' is-invalid' : ''}}" name="lastName" required>
                                    <input value="{{$existing_patient->nationalNumber}}" style="text-align: right" id="nationalNumber" type="hidden" class="form-control{{$errors->has('nationalNumber') ? ' is-invalid' : ''}}" name="nationalNumber" required>
                                    <input value="{{$existing_patient->phoneNumber}}" style="text-align: right" id="phoneNumber" type="hidden" class="form-control{{$errors->has('phoneNumber') ? ' is-invalid' : ''}}" name="phoneNumber" required>
                                    <input value="{{$existing_patient->height}}" style="text-align: right" id="height" type="hidden" class="form-control{{$errors->has('height') ? ' is-invalid' : ''}}" name="height" required>
                                    <input value="{{$existing_patient->weight}}" style="text-align: right" id="weight" type="hidden" class="form-control{{$errors->has('weight') ? ' is-invalid' : ''}}" name="weight" required>
                                    <input value="{{$existing_patient->BMI}}" style="text-align: right" id="BMI" type="hidden" class="form-control{{$errors->has('BMI') ? ' is-invalid' : ''}}" name="BMI" required>
                                </div>
                                <label for="date" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right; margin-left: 100px">{{ __('تاریخ ویزیت جدید را انتخاب کنید') }}</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection