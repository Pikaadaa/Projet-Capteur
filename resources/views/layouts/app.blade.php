<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags</title>
</head>
<body>
    @include('partials.navbar')
    @include('layouts.navigation')
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>
</html>


