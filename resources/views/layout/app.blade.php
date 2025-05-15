<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <a href="/" class="flex items-center py-4">
                        <span class="font-semibold text-gray-500 text-lg">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>

</html>