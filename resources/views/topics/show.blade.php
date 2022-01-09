@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('topics')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('topics.fields.title')</th>
                    <td>{{ $topic->title }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('topics.index') }}" class="btn btn-default">@lang('back_to_list')</a>
        </div>
    </div>
@stop