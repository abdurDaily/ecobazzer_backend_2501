@extends('backend.layout')
@push('backend_css')
<style>
    .table-container {
        overflow-x: auto;
        scrollbar-width: thin;
        /* Firefox */
        scrollbar-color: #6366f1 #f1f3f5;
        /* Firefox */
    }

    /* Chrome, Edge, Safari */
    .table-container::-webkit-scrollbar {
        height: 6px;
        width: 6px;
    }

    .table-container::-webkit-scrollbar-track {
        background: linear-gradient(180deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
    }

    .table-container::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .table-container::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #4f46e5, #4338ca);
    }
</style>
@endpush
@section('backend_content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <p class="mb-0">Show All Products</p>
        <a href="#" class="btn btn-primary">Go Back</a>
    </div>

    <div class="card-body table-responsive table-container">
        <table class="table table-border table-hover table-striped">
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Category</td>
                <td>Images</td>
                <td>Price</td>
                <td>Discount Price</td>
                <td>Is Stock</td>
                <td>Status</td>
                <td>Descriptions </td>
                <td>Actions</td>
            </tr>

            @forelse ($products as $key => $product)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->category->title }}</td>
                <td style="min-width: 300px">
                    <div class="row">
                        @foreach ($product->productImages as $img)
                        <div class="col-4">
                            <div style="border: 1px solid #4f46e5; display: flex; align-items: center; line-height: 0; justify-content: center; gap: 5px;">
                                <img style="height: 50px; object-fit: cover;" class="img-fluid" src="{{ asset('storage/product_images/'. $img->image_name) }}" alt="">
                                <a href="{{ route('dashboard.product.delete', $img->id) }}"><iconify-icon icon="proicons:delete" width="24" height="24"></iconify-icon></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount_price }}</td>
                <td> <span class="badge bg-{{ $product->is_stock == 1 ? 'success' : 'danger' }}">{{ $product->is_stock
                        == 1 ? 'stock' : 'out of stock' }}</span> </td>
                <td> <span class="badge bg-{{ $product->status == 1 ? 'success' : 'danger' }}">{{ $product->status == 1
                        ? 'Active' : 'In Active' }}</span> </td>
                <td style="min-width: 200px;">
                    <p>{{ Str::limit($product->descriptions, 100, '.....') }}</p>
                </td>
                <td style="min-width: 200px;">
                    <a href="{{ route('dashboard.product.edit', $product->slug) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                </td>

            </tr>
            @empty

            @endforelse
        </table>
    </div>

</div>
@endsection