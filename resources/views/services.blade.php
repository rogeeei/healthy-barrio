<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Healthy Barrio | Services Summary</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
    @vite('resources/css/styles.css')
    @vite('resources/css/custom.css')
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <services-component></services-component>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   @vite('resources/js/app.js')
</body>
</html>
