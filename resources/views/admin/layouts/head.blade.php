<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Supra</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">

    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
</head>

<body class="bg-dark text-light">
    @include('admin.partials.navbar')
    
    @include('admin.partials.alert')
    
    @yield("main-content")
</body>

</html>
