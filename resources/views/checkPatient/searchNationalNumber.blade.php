@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white" style="float: right;text-align: right">{{ __('جستجوی بیمار') }}</div>
                    <div class="card-body">
                        <form method="post" action="">
                            @csrf
                            <div class="form-group row">
                                <button type="submit" class="btn btn-sm bg-primary text-white" name="clickbtn" value="Display Result" style="float: left;display: inline-block">
                                    <i class="fas fa-search"></i>
                                </button>
                                <div class="col-md-6">
                                    <input style="text-align: right; display: inline-block" id="nationalNumber" type="number" class="form-control{{ $errors->has('nationalNumber') ? ' is-invalid' : '' }}" name="nationalNumber" required autofocus>

                                    @if ($errors->has('nationalNumber'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nationalNumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="nationalNumber" class="col-md-4 col-form-label text-md-right" style="float: right;text-align: right; margin-left: 45px">{{ __('جستجو بر اساس شماره ملی') }}</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection