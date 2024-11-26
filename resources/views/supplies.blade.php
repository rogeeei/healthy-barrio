<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Healthy Barrio | Supplies</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <!-- Include CSS -->
    @vite('resources/css/styles.css')
    @vite('resources/css/custom.css')
    
    <!-- Include Font Awesome and Bootstrap 5.2 -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <div id="app">
      <!-- Vue component for managing supplies -->
      <supplies-component></supplies-component>
    </div>

    <!-- Vue and JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3.2.0/dist/vue.global.js"></script>
    @vite('resources/js/app.js')
  </body>
</html>
