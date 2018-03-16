<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>FMS</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

   @extends('parti.layout.cssincludes')
</head>
<body>
@extends('parti.layout.header')
</body>
@extends('parti.layout.jsincludes')
@yield('body')
</html>
