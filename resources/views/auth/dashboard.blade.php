<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center items-center px-4 min-h-screen bg-gray-50">
    <div class="p-6 w-full max-w-2xl text-center bg-white rounded-lg shadow-lg">
        <div class="container">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    <button class="float-right text-green-700"
                        onclick="this.parentElement.style.display='none'">&times;</button>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h1 class="mb-4 text-3xl font-bold text-gray-800">Welcome to Your Dashboard, {{ Auth::user()->name }}!</h1>
        <p class="mb-6 text-gray-600">
            We're glad to have you back. Explore your account or log out when you're done.
        </p>

        <div class="flex gap-4 justify-center mb-4">
            @if (Auth::user()->profile)
                <div class="p-6 text-left bg-white rounded-lg shadow-md">
                    <h3 class="mb-4 text-lg font-semibold text-gray-800">Profile Information</h3>
                    <div class="space-y-3">
                        @foreach (['id' => 'Id:', 'address' => 'Address:', 'position' => 'Position:', 'phone' => 'Phone:'] as $key => $label)
                            <p class="text-gray-700"><span class="font-medium text-gray-900">{{ $label }}</span>
                                @if ($key == 'id')
                                    {{ Auth::id() }}
                                @else
                                    {{ Auth::user()->profile->$key }}
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ route('profile.create') }}"
                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Create Profile
                </a>
            @endif
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @method('POST')
            @csrf
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white rounded-md shadow-sm bg-neutral-800 hover:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">
                Logout
            </button>
        </form>
    </div>
</body>

</html>
