<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset("backendadmin/lib/font-awesome/css/font-awesome.css")}}" rel="stylesheet">
    <link href="{{asset("backendadmin/lib/Ionicons/css/ionicons.css")}}" rel="stylesheet">
    <link href="{{asset("backendadmin/lib/perfect-scrollbar/css/perfect-scrollbar.css")}}" rel="stylesheet">
    <link href="{{asset("backendadmin/lib/rickshaw/rickshaw.min.css")}}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset("backendadmin/css/starlight.css")}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />

</head>

<body>

<!-- ########## START: LEFT PANEL ########## -->
@include('admin-body.sidebar')<!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
@include('admin-body.header')<!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
<!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
@yield('content')<!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="{{asset("backendadmin/lib/jquery/jquery.js")}}"></script>
<script src="{{asset("backendadmin/lib/popper.js/popper.js")}}"></script>
<script src="{{asset("backendadmin/lib/bootstrap/bootstrap.js")}}"></script>
<script src="{{asset("backendadmin/lib/jquery-ui/jquery-ui.js")}}"></script>
<script src="{{asset("backendadmin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js")}}"></script>
<script src="{{asset("backendadmin/lib/jquery.sparkline.bower/jquery.sparkline.min.js")}}"></script>
<script src="{{asset("backendadmin/lib/d3/d3.js")}}"></script>
<script src="{{asset("backendadmin/lib/rickshaw/rickshaw.min.js")}}"></script>
<script src="{{asset("backendadmin/lib/chart.js/Chart.js")}}"></script>
<script src="{{asset("backendadmin/lib/Flot/jquery.flot.js")}}"></script>
<script src="{{asset("backendadmin/lib/Flot/jquery.flot.pie.js")}}"></script>
<script src="{{asset("backendadmin/lib/Flot/jquery.flot.resize.js")}}"></script>
<script src="{{asset("backendadmin/lib/flot-spline/jquery.flot.spline.js")}}"></script>

<script src="{{asset("backendadmin/js/starlight.js")}}"></script>
<script src="{{asset("backendadmin/js/ResizeSensor.js")}}"></script>
<script src="{{asset("backendadmin/js/dashboard.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type){
        case 'info':
            toastr.info("{{session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{session::get('message')}}",{timeOut: 80});
            break;
        case 'warning':
            toastr.warning("{{session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{session::get('message')}}");
            break;
    }

    @endif
</script>
</body>
</html>
