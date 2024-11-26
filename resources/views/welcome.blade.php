<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Barrio</title>
    <!-- In your Blade template -->
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @vite('resources/js/app.js')

<!-- This line should automatically inject the correct path -->
</head>

<body>
    <div id="app">
        <!-- This is where Vue mounts -->
        <index-component></index-component>
    </div>
</body>

</html>
