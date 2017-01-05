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
                    <div class="panel-heading">Tower Listing</div>
                    <div class="panel-body">
                        <a href="{{ route('towers.create') }}" class="btn btn-info">Add New Tower</a><br><br>
                        <div class="table-responsive">
                            {!! $table->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
