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
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Tower Name</th>
                                <th>Region</th>
                                <th>Action</th>
                            </tr>
                            @foreach($towers as $tower)
                                <tr>
                                    <td>{{$tower->name}}</td>
                                    <td>{{$tower->region->name}}</td>
                                    <td><a href="{{ route('towers.edit', $tower->id) }}" class="btn">Edit</a></td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $towers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
