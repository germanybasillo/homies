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
    color: #333;
    margin: 0 5px;
    cursor: pointer;
}

.form-group .user-type-link:hover {
    background-color: red;
    border-color: red;
    color: white;
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


        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url('/bg.jpg'); background-size: cover; background-position: center;">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
