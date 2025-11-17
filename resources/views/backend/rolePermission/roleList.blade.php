@extends('backend.layout')
@section('backend_content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <p class="mb-0">Assign Role</p>

        <a href="#" class="btn   btn-primary btn-sm">Create Role</a>

    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.rolePermission.role.list.store') }}" method="post">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <table class="table table-bordered table-striped text-center">
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </tr>
                @forelse ($roles as $key => $role )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <label for="role_{{ $role->id }}">{{ $role->name }}</label>
                    </td>
                    <td>
                        <input {{ $user->hasRole($role->name) ? 'checked' : '' }} value="{{ $role->name }}"
                        name="roles[]" type="checkbox" id="role_{{ $role->id }}">
                    </td>
                </tr>
                @empty

                @endforelse
            </table>

            <button class="btn btn-primary mt-3 w-100">Assign Role</button>
        </form>
    </div>


</div>
@endsection