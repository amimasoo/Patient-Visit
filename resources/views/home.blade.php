@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" >
            <div class="card" style="box-shadow: 5px 10px 20px #3e3e3e;">
                <div class="card-header text-right">ادمین</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    خوش آمدید

                    <a class="btn btn-block btn-primary">اضافه کردن ویزیت</a>
                    <a class="btn btn-block btn-warning">لیست بیماران</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
