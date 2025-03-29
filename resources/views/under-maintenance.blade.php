<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }} - Under Maintenance</title>
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center items-center p-4 min-h-screen bg-gray-100">
    <div class="p-8 w-full max-w-md text-center bg-white rounded-lg shadow-md">
        <div class="mb-4 text-6xl">🛠️</div>
        <h1 class="mb-4 text-2xl font-bold text-red-500">Under Maintenance</h1>
        <p class="mb-4 text-gray-600">
            {{ $maintenanceMessage ?? 'This page is currently under maintenance. We apologize for the inconvenience.' }}
        </p>
        <p class="mb-6 text-gray-500">Our team is working hard to improve this section of the website.</p>
        <a href="{{ url('/') }}"
            class="inline-block px-6 py-2 text-white bg-blue-500 rounded transition-colors hover:bg-blue-600">
            Return to Home Page
        </a>
    </div>
</body>

</html>
