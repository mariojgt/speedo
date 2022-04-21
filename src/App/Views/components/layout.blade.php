<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Speedo Home</title>
    <link href="public/speedo/css/app.css" rel="stylesheet">
    @stack('css')
</head>

<body>

    <div id="app">
        @yield('content')
    </div>

</body>
{{-- Include the footer --}}
@include('components.footer')
@stack('js')
<script src="public/speedo/js/app.js" defer></script>
<script src="public/speedo/js/vue.js" defer></script>

</html>
