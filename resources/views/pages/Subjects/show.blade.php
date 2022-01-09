@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Subject_details
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Subject_details
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">Subject_details</a>
                                 </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">Subject_Attachments</a>
                                </li>
                                 
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">name</th>
                                            <td>{{ $subject->name }}</td>
                                             <th scope="row">teacher</th>
                                            <td>{{ $subject->teacher->Name }}</td>

                                            
                                        </tr>

                                        <tr>
                                            <th scope="row">Semestre</th>
                                            <td>{{ $subject->semestre->semestre_name }}</td>
                                            
                                           
                                        </tr>

                                      
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{route('Upload_Subject')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        @can('add_subject')
                                                        <label
                                                            for="academic_year">subjects_Attachments
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="subject_name" value="{{$subject->name}}">
                                                        <input type="hidden" name="subject_id" value="{{$subject->id}}">
                                                        
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       submit
                                                </button>
                                                @endcan
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">subject_filename</th>
                                                <th scope="col">created_at</th>
                                                <th scope="col">Processes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subject->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->filename}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{url('Download_Subject')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                           role="button"><i class="fas fa-download"></i>&nbsp; Download</a>
                                                        @can('add_subject')
                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="Delete">delete
                                                        </button>
                                                        @endcan

                                                    </td>
                                                </tr>
                                                @include('pages.Subjects.Delete_img')
                                            @endforeach
                                            </tbody>
                                        </table>
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