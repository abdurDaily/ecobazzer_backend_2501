@extends('backend.layout')
@section('backend_content')
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <p class="mb-0">Role Create</p>
            <a href="#" class="btn btn-primary btn-sm">List All Roles</a>
        </div>

        <div class="card-body">
           <form action="{{ route('dashboard.rolePermission.create.role.store') }}" method="post">
            @csrf

            <label for="name">Role Name:</label>
            <input name="role_name" type="role_name" class="form-control p-2" placeholder="role name">
            <button class="btn btn-outline-primary mt-3">Submit</button>
           </form>
        </div>
    </div>
@endsection