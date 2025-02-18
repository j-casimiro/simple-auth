<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Profiles</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="container px-4 py-8 mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">All Profiles</h1>
            <a href="{{ route('showDashboardPage') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700">
                Back to Dashboard
            </a>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($profiles as $profile)
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-4 text-xl font-semibold">{{ $profile->user->name }}'s Profile</h2>
                    <div class="space-y-2">
                        <p><span class="font-medium">Position:</span> {{ $profile->position }}</p>
                        <p><span class="font-medium">Phone:</span> {{ $profile->phone }}</p>
                        <p><span class="font-medium">Address:</span> {{ $profile->address }}</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('profile.show', $profile) }}" class="text-blue-600 hover:text-blue-800">
                            View Details →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
