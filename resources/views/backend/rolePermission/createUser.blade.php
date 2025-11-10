@extends('backend.layout')
@section('backend_content')
<div class="card p-3">
    <div class="card-header d-flex justify-content-between align-items-center ">
        <h5 class="mb-0">Create new user</h5>
        <a href="#" class="btn btn-primary">List users</a>
    </div>

    <div class="card-body">
        <form action="{{ route('dashboard.rolePermission.store.user') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-4 text-center position-relative">
                    <span class="remove_btn"
                        style="position: absolute; line-height: 0; right: 49px; top: -8px; color: red; border: 1px solid red;  display: none; align-items: center; padding: 8px; border-radius: 10px; cursor: pointer; ">
                        <iconify-icon icon="pajamas:remove" width="16" height="16"></iconify-icon>
                    </span>
                    <label for="imgInp">
                        <img id="user_image"
                            style="max-width: 200px; width: 100%; border: 1px solid #00000024; padding: 20px; cursor: pointer;"
                            class="img-fluid" src="{{ asset('assets/img/upload.webp') }}" alt="">
                    </label>
                    <input name="user_image" hidden accept="image/*" type='file' id="imgInp" />

                    @error('user_image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="user_name">user name:</label>
                            <input type="text" class="form-control p-3" placeholder="user name" name="user_name">
                        </div>
                        <div class="col-lg-6">
                            <label for="user_email">user email:</label>
                            <input type="email" class="form-control p-3" placeholder="user email" name="user_email">
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="user_password">user email:</label>
                            <input type="password" class="form-control p-3" placeholder="user password"
                                name="user_password">
                            @error('user_password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-2">
                            <label for="user_confirm_password">user email:</label>
                            <input type="password" class="form-control p-3" placeholder="confirm password"
                                name="user_confirm_password">
                            @if(session('pass_error'))
                            <p class="text-danger">{{ session('pass_error') }}</p>
                            @endif
                        </div>

                        <div class="col mt-3">
                            <button type="submit" class="w-100 btn btn-primary p-2">Register new user </button>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@push('backend_js')
<script>
    let defaultImage = `{{ asset('assets/img/upload.webp') }}`;


    imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        user_image.src = URL.createObjectURL(file)
        $('.remove_btn').show()
    }
   }

   $('.remove_btn').on('click', function(){
     $('#user_image').attr('src', defaultImage)
     $('.remove_btn').hide()
   })
</script>
@endpush