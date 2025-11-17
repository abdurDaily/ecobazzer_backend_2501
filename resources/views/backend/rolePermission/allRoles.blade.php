@extends('backend.layout')
@section('backend_content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center">
        <p class="mb-0 pb-0">Roles</p>
        <a href="" class="btn btn-primary btn-sm">Create new Role</a>
    </div>

    <div class="card-body table-responsive ">
        <table class="table table-striped table-bordered">
            <tr class="text-center">
                <th>#</th>
                <th>Role Name</th>
                <th>Actions</th>
            </tr>
            @forelse ($roles as $key => $role )
            <tr class="text-center">
                <td> {{ ++$key }} </td>
                <td> {{ $role->name }} </td>
                <td>
                    <a href="{{ route('dashboard.rolePermission.permissions', $role->id) }}">
                        <iconify-icon icon="tdesign:key" width="24" height="24"></iconify-icon>
                    </a>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="2" class="alert alert-danger text-center">No role found </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection