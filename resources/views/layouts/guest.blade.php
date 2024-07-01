<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
    .form-group {
    text-align: center;
    margin-bottom: 23px;
}

.form-group .user-type-link {
    display: inline-block;
    padding: 10px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-decoration: none;
    color: red;
    margin: 0 5px;
    cursor: pointer;
}

.form-group .user-type-link:hover {
    background-color: red;
    border-color: red;
    color: white;
}

.form-group .btn1{
    color: green;
}

.form-group .btn2{
    color: blue;
}

.form-group .btn1:hover {
    background-color: green;
    border-color: green;
    color: white;
}

.form-group .btn2:hover {
    background-color: blue;
    border-color: blue;
    color: white;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .form-group {
        margin-bottom: 16px;
    }

    .form-group .user-type-link {
        padding: 8px 16px;
        margin: 5px 0;
    }
}

@media (max-width: 480px) {
    .form-group {
        margin-bottom: 12px;
    }

    .form-group .user-type-link {
        padding: 6px 12px;
        margin: 3px 0;
    }
}

@keyframes slideleft {
    from {
        background-position: 0%;
    }
    to {
        background-position: 90000%;
    }
}

@-webkit-keyframes slideleft {
    from {
        background-position: 0%;
    }
    to {
        background-position: 90000%;
    }
}

.w3layouts-main{
    background-image: url('/bg.jpg');
    background-repeat: repeat-x;
    animation: slideleft 20000s infinite linear;
    -webkit-animation: slideleft 20000s infinite linear;
    background-size: cover;
	-webkit-background-size:cover;
	-moz-background-size:cover; 
    background-attachment: fixed;
    position: relative;
	min-height: 100vh;
}

.bg-layer {
    background: rgba(0, 0, 0, 0.7);
	min-height: 100vh;
}

.header-main {
	max-width: 310px;
	margin: 0 auto;
	position: relative;
	z-index: 999;
	padding: 3em 2em;
	background: rgba(255, 255, 255, 0.04);
	-webkit-box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
	box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
}
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased w3layouts-main">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-layer">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4  shadow-md overflow-hidden sm:rounded-lg header-main">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
