<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/app.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- end of global level css -->
    <link href="vendors/iCheck/css/square/blue.css" rel="stylesheet" type="text/css" />
    <link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet" />
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="css/pages/login.css" />
    <!-- end of page level css -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Recruitment BPR MAA') }}</title>

   
    
</head>
<body>
    

        @yield('content')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <script src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="vendors/iCheck/js/icheck.js" type="text/javascript"></script>
    <script src="js/pages/login.js" type="text/javascript"></script>
</body>
</html>
