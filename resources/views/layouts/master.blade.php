<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }} | App Ari Budiman</title>
    <!-- font poppins from google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
    <!-- tailwind frameworks -->
    <link rel="preload" as="style" href="{{ site_url('build/assets/app-95157e6f.css') }}">
    <link rel="stylesheet" href="{{ site_url('build/assets/app-95157e6f.css') }}">
    <!-- trix editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body class="{{ $background }}">
    @include('layouts.navbar')
    @yield('content')
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3941d04b00.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault;
        });
    </script>
</body>

</html>