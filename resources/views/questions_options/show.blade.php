@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('questions-options')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('questions-options.fields.question')</th>
                    <td>{{ $questions_option->question->question_text or '' }}</td></tr><tr><th>@lang('questions-options.fields.option')</th>
                    <td>{{ $questions_option->option }}</td></tr><tr><th>@lang('questions-options.fields.correct')</th>
                    <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('questions_options.index') }}" class="btn btn-default">@lang('back_to_list')</a>
        </div>
    </div>
@stop