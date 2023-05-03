<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Reset Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center
                 min-vh-100">
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5>Reset Password?</h5>
                                <p class="mb-2">Enter your new password here!
                                </p>
                            </div>

                            <form method="post" action="/updatepass">

                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button> 
                                    {{ session('success') }}
                                </div>
                                @elseif(session('failed'))
                                <div class="alert alert-success" ole="alert">
                                    button type="button" class="close" data-dismiss="alert">&times;</button> 
                                    {{ session('failed') }}
                                </div>
                                @endif

                                @csrf

                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="reset_token" value="{{ $reset_token }}">

                                <div class="form-outline mb-4">                         
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autofocus>
                                    <label for="password">New Password</label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">                         
                                    <input id="password_confirmation" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>
                                    <label for="password_confirmation">Confirm Password</label>

                                    @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>