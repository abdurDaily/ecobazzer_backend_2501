@extends('backend.layout')
@push('backend_css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endpush
@section('backend_content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <p class="mb-0">New Product add</p>
        <a href="#" class="btn btn-primary">View All Products</a>
    </div>


    <div class="card-body">
        <form action="{{ route('dashboard.product.store') }}" method="post" enctype="multipart/form-data" class="p-4">
            @csrf

            <div class="row">
                <div class="col-lg-6">
                    <label for="product_title">product title : </label>
                    <input name="product_title" type="text" placeholder="product title" class="P-3 mb-3 form-control">
                </div>
                <div class="col-lg-6">
                    <label for="product_title">Select Category : </label>
                    <select name="category_id" id="" class="form-control text-center  mb-3">
                        <option value="" selected disabled> ---select category----</option>
                       @foreach ($categories as $category)
                         <option value="{{ $category->id }}"> {{ $category->title }} </option>
                       @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="product_title">Product Price : </label>
                    <input placeholder="add price" type="number" class="form-control p-2" name="product_price">
                </div>
                <div class="col-lg-6">
                    <label for="product_title">Product Discount Price : </label>
                    <input placeholder="add price" type="number" class="form-control p-2"
                        name="discount_product_price">
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="product_title">Select Stock : </label>
                    <select name="stock_id" id="" class="form-control  mb-3">
                        <option value="1">in stock</option>
                        <option value="0">out stock</option>
                    </select>
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="product_title">Select Status : </label>
                    <select name="status_id" id="" class="form-control  mb-3">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-lg-6 ">
                    <label for="product_details">Product Details : </label>
                    <textarea placeholder="product details...." name="product_details" id=""
                        class="form-control"></textarea>
                </div>
                <div class="col-lg-6 ">
                    <label for="product_details">Uploaded Images : </label>
                    <input name="images[]" multiple type="file" class="images form-control p-2">
                </div>

                <button type="submit" class="btn btn-primary mt-2 p-2">Upload</button>
            </div>

        </form>
    </div>
</div>
@endsection

@push('backend_js')
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

<script>
    $('.images').filepond({
    allowMultiple: true,
    storeAsFile:true
});
</script>
@endpush