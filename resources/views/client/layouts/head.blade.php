<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Japanese Autos</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">

    <style>
        :root {
            color-scheme: light;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: #f8fafc;
        }

        body {
            min-height: 100vh;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            min-height: 72px;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        .navbar .nav-link {
            color: #4b5563;
            transition: color 0.2s ease;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #0d6efd;
        }

        .hero-card {
            border: none;
            border-radius: 2rem;
            overflow: hidden;
        }

        .hero-card .card-img-top,
        .card-img-cover {
            object-fit: cover;
            height: 420px;
        }

        .card-hover {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12);
        }

        .badge-soft {
            color: #0d6efd;
            background-color: rgba(13, 110, 253, 0.12);
        }

        .section-divider {
            width: 64px;
            height: 4px;
            background: #0d6efd;
            border-radius: 999px;
            margin-top: 0.6rem;
        }

        .meta-pill {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            color: #4b5563;
        }

        .hero-feature {
            min-height: 360px;
        }

        .nav-link.active {
            font-weight: 600;
        }
    </style>

    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
</head>

<body>
    @include('client.partials.navbar')
    
    @yield("main-content")
</body>

</html>
