<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>laraSkambit - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/head.css') }}" >

  </head>
  <body>

    @include('layouts.header')

    @yield('conteudo')

    @include('layouts.footer')

  </body>
</html>
