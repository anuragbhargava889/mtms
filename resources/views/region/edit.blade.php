@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-nav">
                    @include('sidebar')
                </div>
            </div>
            <div class="col-md-9">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Region</div>
                    <div class="panel-body">
                        {!! Form::model($region, ['method' => 'put', 'autocomplete' => 'off','route' => ['regions.update', $region] ]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Region Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['enable' => 'Enable', 'disable' => 'Disable'], null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
