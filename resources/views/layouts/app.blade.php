<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
          crossorigin="anonymous"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
          crossorigin="anonymous"/>
    <style type="text/css">
        .label-info {
            background-color: #17a2b8;
        }

        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out,
            border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .post-section {
            border: 1px solid #b8b8b8;
            border-radius: 5px;
            padding: 1rem;
            margin: 0.5rem;
            background: white;
        }

        .post-icon {
            border-radius: 50%;
            border: 2px dashed;
            padding: 3px;
        }

        .post-user {
            margin: 0;
        }

        .post-title {
            margin: 5px 0;
        }

        .post-date {
            font-size: 12px;
            color: gray;
        }

        .post-content {
            margin: 5px 0;
        }

        .bootstrap-tagsinput {
            width: 100%;
            background-color: #f8fafc;
        }

        .card-body-posts {
            background: #efefef;
        }

        .card-body-posts .bootstrap-tagsinput {
            width: auto;
        }

        nav[role="navigation"] > div:nth-child(1) {
            text-align: center;
            padding: 1rem;
        }

        nav[role="navigation"] > div:nth-child(2) {
            display: none;
        }

        .btn {
            color: white !important;
            margin: 0 5px;
        }

        .display-inline {
            display: inline;
        }

        .comment {
            border-top: 1px solid #dadada;
            border-radius: 10px;
            padding: 5px 20px;
        }

        .comment-add {
            border-top: 1px solid #dadada;
            border-radius: 10px;
            padding: 10px 0px;
        }

        .comment-date {
            font-size: 10px;
            color: gray;
        }

        .comment-user {
            font-weight: bold;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    @include('layouts.header')
    <main class="py-4">
        @yield('content')
    </main>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js"
        crossorigin="anonymous"></script>
</body>
</html>
