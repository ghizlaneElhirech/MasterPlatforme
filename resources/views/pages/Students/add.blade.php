@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    add_student
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    add_student
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

                <form method="post"  action="{{ route('Students.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">personal_information</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>name_ar : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>name_en : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>email : </label>
                                    <input type="email"  name="email" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>password :</label>
                                    <input  type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">gender : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach($Genders as $Gender)
                                            <option  value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
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
                                            <option  value="{{ $nal->id }}">{{ $nal->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date_of_Birth :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
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
                                        
                                        @foreach($my_classes as $c)
                                            <option  value="{{ $c->id }}">{{ $c->semestre_name }}</option>
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
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </div><br>

                             <div class="col-md-3">
                        <div class="form-group">
                            <label for="academic_year">Attachments : <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="photos[]" multiple>
                        </div>
                    </div>


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
                        url: "{{ URL::to('Get_classrooms') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="semestre_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="semestre_id"]').append('<option value="' + key + '">' + value + '</option>');
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
