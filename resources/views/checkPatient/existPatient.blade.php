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
                        <form method="post" action="">
                             @csrf
jhhjb
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection