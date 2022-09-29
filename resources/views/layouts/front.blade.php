<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="frontend/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <link href="frontend/css/custom.css" rel="stylesheet" />
    <link href="frontend/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="frontend/css/owl.theme.default.min.css" rel="stylesheet" />
{{--    font awesome--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


    <style>
        a{
            text-decoration: none !important;
        }
    </style>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id='app'>

@include('layouts.inc.frontnavbar')

        <div class="content">
            @yield('content')
        </div>


    <div class="whatsapp">
        <a href="https://wa.me/+254770671953?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
            <img src="assets/images/download.jpg" alt="whatsapp-img" height="70px" width="70px">
        </a>
    </div>


</div>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="frontend/js/jquery-3.6.1.min.js"></script>

<script src="frontend/js/perfect-scrollbar.jquery.min.js"></script>

<script src="frontend/js/owl.carousel.min.js"></script>
<script src="frontend/js/custom.js"></script>
<script src="frontend/js/checkout.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6335528e54f06e12d8977c94/1ge44kvh9';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



<script>


        var availableTags = [];

        $.ajax({
            method: "GET",
            url: "/product_list",
            success: function (response) {
                startAutocomplete(response)
            }
         });

        function startAutocomplete(availableTags)
        {
            $( "#search_product" ).autocomplete({
                source: availableTags
            });
        }

</script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session('status'))
    <script>
        swal("{{ session('status') }}")
    </script>
@endif

@yield('script')


</body>
</html>

