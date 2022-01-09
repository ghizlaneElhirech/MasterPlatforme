@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Subjects
@stop
@endsection
@section('page-header')
    <!-- breadcrumb --> 
@section('PageTitle') 
    Subjects 
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
                                @can('add_subject')
                                <a href="{{route('subjects.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">add new subject</a>
                                 @endcan
                                   <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject Name</th>
                                            
                                            <th>Semester</th>
                                            
                                            
                                            <th>Teacher Name</th>
                                            <th>Process</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subjects as $subject)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$subject->name}}</td>
                                            
                                            <td>{{$subject->semestre->semestre_name}}</td>
                                            
                                            <td>{{$subject->teacher->Name}}</td>
                                                <td>
                                                    @can('edit_subject')
                                                    <a href="{{route('subjects.edit',$subject->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete_subject')
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                    
                                                  <a href="{{route('subjects.show',$subject->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>
                                                  
                                                  @can('view_subject_student')
                                                  <a href="{{route('Attendance.show',$subject->id)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i> students</a>
                                                  @endcan
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('subjects.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">save</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> Warning_Grade {{$subject->name}}</p>
                                                            <input type="hidden" name="id"  value="{{$subject->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
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