<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | JDM Autos</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>

    <div class="container min-vh-100">
        <div class="row min-vh-100 align-items-center justify-content-center py-4">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                <div class="display-3 fw-bold text-success mb-4 text-center">
                    JDM Autos
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-4 py-2 small text-break" role="alert">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div>
                            <input type="text" name="username" value="{{ old('username') }}"
                                class="form-control w-100 @error('username') is-invalid @enderror" id="username"
                                aria-describedby="username-feedback" required autocomplete="username">
                            <div id="username-feedback">
                                @error('username')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div>
                            <input type="password" name="password"
                                class="form-control w-100 @error('password') is-invalid @enderror" id="password"
                                aria-describedby="password-feedback" required autocomplete="current-password">
                            <div id="password-feedback">
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
