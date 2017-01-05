<div class="panel panel-default">
    <div class="panel-heading">Menu</div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            @role('admin')
            <li class="sidebar  {{ Active::check('regions',true,'active','no') }}">
                <a href="{{ route('regions.index') }}" class="btn btn-success">Region Management</a>
            </li>
            <li class="sidebar  {{ Active::check('roles',true,'active','no') }}">
                <a href="{{ route('roles.index') }}" class="btn btn-success">Role Management</a>
            </li>
            <li class="sidebar  {{ Active::check('users',true,'active','no') }}">
                <a href="{{ route('users.index') }}" class="btn btn-success">User Management</a>
            </li>
            @endrole
            <li class="sidebar  {{ Active::check('towers',true,'active','no') }}">
                <a href="{{ route('towers.index') }}" class="btn btn-success">Tower Management</a>
            </li>
            <li class="sidebar  {{ Active::check('inspections',true,'active','no') }}">
                <a href="{{ route('inspections.index') }}" class="btn btn-success">Add Inspections</a>
            </li>
        </ul>
    </div>
</div>