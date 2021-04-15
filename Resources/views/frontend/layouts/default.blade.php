<!DOCTYPE html>
<html lang="en">


        <title>BlogTheme</title>
    <meta name="csrf-token" id="_token" content="{{ csrf_token() }}">

    <base href="{{\URL::to('/')}}">

    <meta name="current-url" id="current_url" content="{{ url()->current() }}">

    <meta name="debug" id="debug" content="true">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">

    @yield('vaahcms_extend_frontend_head')

    @yield('vaahcms_extend_frontend_css')

	<body>

	<?php

	//vh_get_modules_extended_views('menu');

	?>

    @include("vaahcms::frontend.partials.alerts")
    @include("vaahcms::frontend.partials.flash")

    @include('bulmablogtheme::frontend.partials.top-menu')


    @yield('content')


    @yield('vaahcms_extend_frontend_scripts')

	</body>
</html>
