@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    list_students
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    list_students
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                @can('add_student')
                                <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">add_student</a>
                                   @endcan
                                   <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>gender</th>
                                            <th>semestre</th>
                                            
                                            
                                            <th>Processes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->Name}}</td>
                                            <td>{{$student->semestre->semestre_name}}</td>
                                            
                                           
                                               <td>
                                                    @can('edit_student')
                                                    <a href="{{route('Students.edit',$student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete_student')
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                    @can('view_student')

                                                    <a href="{{route('Students.show',$student->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @include('pages.Students.Delete')
                                        @endforeach
                                     </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection