@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    title_page
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Semestres
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif



<div class="col-xl-12 mb-30">
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
            @can('add_semestre')
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                add_semestre
            </button>
            @endcan
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            
                            <th>Processes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($semestres as $semestre)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                
                                <td>{{ $semestre->semestre_name }}</td>
                                <td>
                                    @can('edit_semestre')
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $semestre->id }}"
                                        title="Edit"><i class="fa fa-edit"></i></button>
                                        @endcan
                                        @can('delete_semesre')
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $semestre->id }}"
                                        title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                            @endcan
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $semestre->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                edit_semestre 
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('semestres.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="semestre_name"
                                                            class="mr-sm-2">s_name_fr') }}
                                                            :</label>
                                                        <input id="semestre_name" type="text" name="semestre_name"
                                                            class="form-control"
                                                            value="{{ $semestre->semestre_name  }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $semestre->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="semestre_name"
                                                            class="mr-sm-2">s_name_en
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $semestre->semestre_name  }}"
                                                            name="semestre_name" required>
                                                    </div>
                                                </div>
                                           
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-success">submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $semestre->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                delete_semestre
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                         <div class="modal-body">
                                            <form action="{{ route('semestres.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                Warning_semestre
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $semestre->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @can('add_semestre')
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    add_semestre
                </h5>
                @endcan
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('semestres.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="semestre_name" class="mr-sm-2">s_name_fr
                                :</label>
                            <input id="semestre_name" type="text" name="semestre_name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="semestre_name" class="mr-sm-2">s_name_en
                                :</label>
                            <input type="text" class="form-control" name="semestre_name">
                        </div>
                    </div>
                 
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">submit</button>
            </div>
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
@endsection