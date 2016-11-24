<div class="panel panel-default">
    <div class="panel-heading">Menu</div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            @role('admin')
            <li><a href="{{ route('roles.index') }}" class="btn btn-success">Role Management</a></li>
            <li><a href="{{ route('users.index') }}" class="btn btn-success">User Management</a></li>
            @endrole
            <li><a href="{{ route('regions.index') }}" class="btn btn-success">Region Management</a></li>
            <li><a href="{{ route('regions.index') }}" class="btn btn-success">Tower Management</a></li>
        </ul>
    </div>
</div>