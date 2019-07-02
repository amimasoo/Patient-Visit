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

                    <p>خوش آمدید</p>

                    <a class="btn btn-block col-4 btn-info" href="searchpatient">اضافه کردن ویزیت</a>
                    <a class="btn btn-block col-4 btn-success" href="patients">لیست بیماران</a>
                        <br><br>
                    <a class="btn btn-block col-4 btn-danger" href="patients/highBMI" style="direction: rtl">BMI بالا</a>
                    <a class="btn btn-block col-4 btn-indigo" href="patients/lowBMI" style="direction: rtl">BMI پایین</a>
                        {{--<br><br>--}}
                    {{--<a class="btn btn-block col-4 btn-warning" href="patients/normalBMI" style="direction: rtl">BMI نرمال</a>--}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
