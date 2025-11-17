@extends('backend.layout')
@section('backend_content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center">
        <p class="mb-0 pb-0">assign permission</p>
        <a href="" class="btn btn-primary btn-sm">Create new Role</a>
    </div>

    <div class="card-body table-responsive ">

        <form action="{{ route('dashboard.rolePermission.permissions.store') }}" method="post">
            @csrf

            <input type="hidden" value="{{ $role->id }}" name="role_name">

            <table class="table table-striped table-bordered">
                <tr class="text-center">
                    <th>#</th>
                    <th>Permissions Name</th>
                    <th>Actions</th>
                </tr>
                @forelse ($permissions as $key => $permission )
                <tr class="text-center">
                    <td> {{ ++$key }} </td>
                    <td>
                        <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                    </td>
                    <td>
                        <input {{ $role->hasPermissionTo($permission->name) ? 'checked' :'' }} value="{{ $permission->name }}" name="permissions[]" type="checkbox" id="permission_{{ $permission->id }}">
                    </td>
                </tr>
    
                @empty
                <tr>
                    <td colspan="2" class="alert alert-danger text-center">No role found </td>
                </tr>
                @endforelse
            </table>

            <button class="btn btn-primary mt-3 w-100">Submit</button>
        </form>

    </div>
</div>
@endsection