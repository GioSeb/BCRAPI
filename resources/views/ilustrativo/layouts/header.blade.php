<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Nexor: Informes Comerciales</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* A few custom styles to replicate the original design */
        #intro {
            width: 100%;
            height: 100vh;
            background: #000;
            overflow: hidden;
            position: relative;
        }
        .carousel-item {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #call-to-action {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("{{ asset('img/intro-carousel/cta-bg.jpg') }}") fixed center center;
            background-size: cover;
        }
        #footer {
            background: #111;
            color: #fff;
        }
    </style>
</head>
