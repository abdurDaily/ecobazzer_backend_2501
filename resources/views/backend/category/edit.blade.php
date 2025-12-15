@extends('backend.layout')

@push('backend_css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .select2-container--default .select2-selection--single {
        height: 57px;
        border: 1px solid #d5d5d5;
        display: flex;
        align-items: center;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 15px;
        right: 2px;
        width: 30px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #c3c3c3;
        line-height: 28px;
    }
</style>
@endpush
@section('backend_content')

<div class="card p-3">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0 pb-0">Add Category</p>
            <a href="{{ route('dashboard.category.view') }}" class="btn btn-primary btn-sm p-2"
                style="display: inline-flex; align-items: center; line-height: 0;"> <span class="me-1">
                    <iconify-icon icon="carbon:view" width="18" height="18"></iconify-icon>
                </span> view all category</a>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('dashboard.category.update',  $edit_category->slug) }}" method="post">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-lg-6">
                    <input value="{{ $edit_category->title }}" type="text" name="title" placeholder="title"
                        class="form-control p-3">
                    @error('title')
                    <p class="text-danger mb-0 pb-0">{{ $message }}</p>

                    @enderror
                </div>

                <div class="col-lg-6">
                    <select class="js-example-basic-single form-control" name="category_id">
                        <option value="AL" selected disabled> ---Select category ---- </option>
                        <option value="" selected disabled> -- select any one --</option>
                        @foreach ($categories as $category)
                        <option {{ $category->id == $edit_category->category_id ? 'selected' : '' }} value="{{
                            $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-lg-6 mt-4">
                    <input type="text" name="meta_title" placeholder="meta title" class="form-control p-3">
                </div>
                <div class="col-lg-6 mt-4">
                    <input type="text" name="meta_keywords" placeholder="meta keywords" class="form-control p-3">
                </div>

                <div class="col-lg-12 mt-4">
                    <textarea name="meta_descriptions" id="" class="form-control p-3"
                        placeholder="meta descriptions..."></textarea>
                </div>

                <div class="col-lg-12">
                    <button class="btn btn-primary p-2 w-100 mt-3" type="submit">update</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

@push('backend_js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush