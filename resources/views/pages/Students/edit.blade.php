@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Student_Edit
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Student_Edit
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{route('Students.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">personal_information</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>name_ar : <span class="text-danger">*</span></label>
                                    <input value="{{$Students->getTranslation('name','ar')}}" type="text" name="name_ar"  class="form-control">
                                    <input type="hidden" name="id" value="{{$Students->id}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>name_en : <span class="text-danger">*</span></label>
                                    <input value="{{$Students->getTranslation('name','en')}}" class="form-control" name="name_en" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>email : </label>
                                    <input type="email" value="{{ $Students->email }}" name="email" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>password :</label>
                                    <input value="{{ $Students->password }}" type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">gender : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach($Genders as $Gender)
                                            <option value="{{$Gender->id}}" {{$Gender->id == $Students->gender_id ? 'selected' : ""}}>{{ $Gender->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">Nationality : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach($nationals as $nal)
                                            <option value="{{ $nal->id }}" {{$nal->id == $Students->nationalitie_id ? 'selected' : ""}}>{{ $nal->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date_of_Birth  :</label>
                                    <input class="form-control" type="text" value="{{$Students->Date_Birth}}" id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">Student_information</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="semestre_id">semestre : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="semestre_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach($semestres as $semestre)
                                            <option value="{{ $semestre->id }}" {{$semestre->id == $Students->semestre_id ? 'selected' : ""}}>{{ $semestre->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                         

                       

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">academic_year : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>Choose...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $Students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function () {
            $('select[name="semestre_id"]').on('change', function () {
                var semestre_id = $(this).val();
                if (semestre_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + semestre_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option selected disabled >Choose...</option>');
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection