@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    list of students
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    List of students 
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif

 

    
    <form >
 
        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">name</th>
                <th class="alert-success">email</th>
                
               
                
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    
                    
                   
                
                </tr>
            @endforeach
            </tbody>
        </table>
       
    </form><br>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection