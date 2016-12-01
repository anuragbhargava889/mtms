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
                    <div class="panel-heading">Edit User</div>
                    <div class="panel-body">
                        {!! Form::model($user, ['method' => 'put', 'route' => ['users.update', $user], 'autocomplete' => 'off']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Uuser Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'E-Mail Address') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('role', 'Role') !!}
                            {!! Form::select('role', $roles, $user->roles->pluck('id')->first(), ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('region', 'Region') !!}
                            {!! Form::select('region', $regions, $selectedRegion, ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
