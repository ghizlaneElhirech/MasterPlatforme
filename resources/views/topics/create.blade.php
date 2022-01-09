@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('topics')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['topics.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                     <select class="custom-select mr-sm-2" name="title">
                                        <option selected disabled>Choose...</option>
                                        @foreach($quizzes as $nal)
                                            <option  value="{{ $nal->name }}">{{ $nal->name }}</option>
                                        @endforeach
                                    </select>
                   
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

