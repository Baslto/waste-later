<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Waste-later</title>
</head>
<body class="w-screen h-screen relative">
    {{ $slot }}
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>
</html>