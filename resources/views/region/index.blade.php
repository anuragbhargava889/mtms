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
                <div class="panel panel-default">
                    <div class="panel-heading">Region Listing</div>
                    <div class="panel-body">
                        <a href="{{ route('regions.create') }}" class="btn btn-info">Add New Region</a><br><br>
                        {!! $table->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
