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
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Region Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($regions as $region)
                                <tr>
                                    <td>{{$region->name}}</td>
                                    <td>{{$region->description}}</td>
                                    <td><a href="{{ route('regions.edit', $region->id) }}" class="btn">Edit</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
