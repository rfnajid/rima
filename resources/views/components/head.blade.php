<head>
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta property="og:title" content="{{ $title }}"/>
    <meta property="og:description" content="{{ $description }}"/>
    <meta property="og:image" content="{{ url('images/logo/logo-rima.jpg')}}"/>
    <meta property="og:locale" content="id_ID" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('styles/style.css') }}">
    <link rel="stylesheet" href="{{ url('styles/'.$css.'.css') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('images/favicon/favicon-16x16.png') }}">
</head>