@extends('frontend/App')

@section('body')
<div class="container">
    <h1>Edit Profile</h1>

    <form method="POST" action="/updateprofile" enctype="multipart/form-data">

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button> 
            {{ session('success') }}
        </div>
        @elseif(session('failed'))
        <div class="alert alert-success" role="alert">
            button type="button" class="close" data-dismiss="alert">&times;</button> 
            {{ session('failed') }}
        </div>
        @endif

        @csrf

        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>

            <div class="col-md-6">
                <img id="avatar-preview" src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('storage/avatars/default-avatar.png') }}" style="width:80px; height:80px; margin-top: 10px; border-radius:50%;">
                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar" onchange="previewImage()">
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="name">Username</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username" readonly>

            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email" readonly>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input id="phoneno" type="text" class="form-control @error('phoneno') is-invalid @enderror" name="phoneno" value="{{ old('phoneno', $user->phoneno) }}" autocomplete="phoneno">

            @error('phoneno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" autocomplete="address">

            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">

            @error('current_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>



        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>

        <!--            <div class="form-group">
                        <label for="image">Profile Image</label>
                        <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="image">
        
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    @if ($user->profile_image)
                        <div class="form-group">
                            <label for="current-image">Current Profile Image:</label>
                            <br>
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="img-thumbnail">
                        </div>
                    @endif-->

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection

<script>
    function previewImage() {
        var preview = document.querySelector('#avatar-preview');
        var otherImg = document.querySelector('#other-img');
        var file = document.querySelector('#avatar').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            otherImg.src = reader.result; // update the src of the other img element
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('storage/avatars/default-avatar.png') }}";
            otherImg.src = "{{ asset('path/to/other/image.png') }}"; // set default src for the other img element
        }
    }

</script>
