<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="container px-4 py-8 mx-auto">
        <div class="mx-auto max-w-2xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Profile Details</h1>
                <div class="space-x-4">
                    <a href="{{ route('showDashboardPage') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700">
                        Dashboard
                    </a>
                    @can('viewAny', App\Models\Profile::class)
                        <a href="{{ route('profile.index') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                            All Profiles
                        </a>
                    @endcan
                </div>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="space-y-4">
                    <div>
                        <h2 class="text-xl font-semibold">{{ $profile->user->name }}'s Profile</h2>
                        <p class="text-gray-500">Member since {{ $profile->created_at->format('M Y') }}</p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <p class="font-medium text-gray-700">Position</p>
                            <p>{{ $profile->position }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-700">Phone</p>
                            <p>{{ $profile->phone }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="font-medium text-gray-700">Address</p>
                            <p>{{ $profile->address }}</p>
                        </div>
                    </div>

                    @can('update', $profile)
                        <div class="pt-4 border-t">
                            <a href="{{ route('profile.edit', $profile) }}"
                                class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
                                Edit Profile
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</body>

</html>
