<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover amazing products in our curated showcase. Premium quality items with modern design and exceptional value.">
    <meta name="keywords" content="products, shopping, electronics, accessories, premium quality">
    <meta name="author" content="Product Showcase">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Product Showcase' }}">
    <meta property="og:description" content="Discover amazing products in our curated showcase">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Product Showcase' }}">

    <title>{{ $title ?? 'Product Showcase' }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="shortcut icon" type="image/png" href="/assets/images/logo.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

    <!-- Styles -->
    @viteReactRefresh
    @vite(['resources/scss/app.scss', 'resources/js/app.jsx'])
</head>

<body>
    <x-header />

    {{ $slot }}

    <x-footer />
</body>

</html>
