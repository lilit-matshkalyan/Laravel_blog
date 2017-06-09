<!DOCTYPE html>
<html >
    <head>
        <style>
            body {

                background-image: url({{'https://wallpaperscraft.com/image/mickey_mouse_grass_flowers_butterfly_toon_68139_1920x1080.jpg'}})

            }
        </style>
        <!-- Basic -->
        <meta charset="UTF-8">
        <title>@yield('title')   </title>


        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!--<link rel="stylesheet" href="{//{ asset('bootstrap-calendar/css/calendar.css') }}">-->
        {!!  Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}

        @yield('header')



    </head>
    <body>





    @yield('body')

        @yield('footer')

    {!!  Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') !!}
    {!!  Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}
        @yield('footer_examples')

    </body>
</html>


