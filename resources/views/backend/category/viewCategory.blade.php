@extends('backend.layout')
@section('backend_content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0 pb-0">Add Category</p>
            <a href="" class="btn btn-primary btn-sm p-2"
                style="display: inline-flex; align-items: center; line-height: 0;"> <span class="me-1">
                    <iconify-icon icon="icon-park-outline:back" width="18" height="18"></iconify-icon>
                </span> Go back </a>
        </div>
    </div>


    <div class="card-body table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Parent</th>
                <th>Meta Title</th>
                <th>Meta Descriptions</th>
                <th>Meta Keywords</th>
                <th>Action</th>
            </tr>

            @forelse ($categories as $key=>$category)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $category->title }}</td>
                <td> <span class="badge bg-{{ $category->parent ? 'success' : 'danger' }}">{{ $category->parent ? $category->parent->title : 'not found' }}</span> </td>
                <td>{{ $category->meta_title ? $category->meta_title: '------' }}</td>
                <td>{{ $category->description ? $category->description: '------' }}</td>
                <td>{{ $category->keywords ? $category->keywords: '------' }}</td>
                <td>
                    <a href="{{ route('dashboard.category.edit', $category->slug) }}" class="btn btn-outline-primary btn-sm">edit</a>
                    <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    <div class="alert alert-danger">
                        <p>No category data found</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection