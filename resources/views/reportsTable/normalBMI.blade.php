@extends('layouts.app')
@section('content')

    <div class="container">
        <h2 class="text-right" style="direction: rtl">بیمار های با BMI نرمال</h2>
        <input id="myInput" class="form-control container" type="text" placeholder=" جستجو کنید ..." style="direction: rtl">
        <br>

        @if(Session::has('message'))
            <p class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <table class="table table-striped table-responsive-xl table-bordered text-center " style="box-shadow: 5px 10px 35px #3e3e3e; text-align: right; direction: rtl">
            <thead class="table-dark">
            <tr>
                <th scope="row">ردیف</th>
                <th >نام</th>
                <th>نام خانوادگی</th>
                <th>شماره تلفن</th>
                <th>کد ملی</th>
                {{--<th>تاریخ ویزیت</th>--}}
                <th>قد</th>
                <th>وزن</th>
                <th>BMI</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody id="myTable">

            @foreach($patients as $patient)
                <tr>
                    <td>{{++$loop->index}}</td>
                    <td>{{$patient['firstName']}}</td>
                    <td>{{$patient['lastName']}}</td>
                    <td>{{$patient['phoneNumber']}}</td>
                    <td>{{$patient['nationalNumber']}}</td>
                    {{--<td>{{$visit['date']}}</td>--}}
                    <td>{{$patient['height']}}</td>
                    <td>{{$patient['weight']}}</td>
                    <td>{{$patient['BMI']}}</td>

                    <td>
                            <span style="font-size: 23px; color: black;">
                               <a href="http://127.0.0.1:8000/edit/{{$patient['id']}}" style="color: black ;">
                                  <i class="far fa-edit"></i>
                               </a>
                             </span>
                    </td>
                    <td>
                            <span style="font-size: 23px; color: black;">
                                <a href="" class="deleteVisit" data-visitid="{{$patient['id']}}" id="deleteID" data-target="#myModal" data-toggle="modal" style="color: black ;">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                             </span>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

        <div class="row" style="font-size: 30px; float: right; padding-right: 10px;">
            <a class="btn col text-white primary-color" href="/visit/add" >
                افزودن ویزیت جدید
            </a>
        </div>
        <div class="row" style="font-size: 30px; float: right; padding-right: 40px;">
            <a class="btn col text-white primary-color" href="/patient/excel" >
                excel
            </a>
        </div>
    </div>

    <br><br><br>
    {{--<div class="pagination justify-content-center">{{ $patients->links() }}</div>--}}

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" style="float: right">حذف ویزیت</h5>
                    <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="text-align: right">
                    آیا از حذف کردن این ویزیت مطمئن هستید؟
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    {{--<button href="delete/{{$patient['id']}}" type="button" class="btn btn-success btn-link" data-dismiss="modal">بله</button>--}}
                    <a id="modalDeleteButton" class="btn waves-effect btn-block btn-success text-white">بله</a><br>
                    <button type="button" class="btn btn-block btn-danger waves-effect" data-dismiss="modal">خیر</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).on('click','.deleteVisit',function(){
            var visit = $(this).attr('data-visitid');
            var visitIDhref = "delete/"+ visit;
            $('#modalDeleteButton').attr("href", visitIDhref);
        });

    </script>

@endsection