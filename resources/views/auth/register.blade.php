<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center items-center px-4 min-h-screen bg-gray-50">
    <div class="p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
        <h1 class="mb-6 text-2xl font-bold text-center text-gray-800">Register User</h1>
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @error('email')
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                {{ $message }}
            </div>
        @enderror
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @method('POST')
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('name') }}" placeholder="Enter your name">
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('email') }}" placeholder="Enter your email">
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    placeholder="Enter your password">
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    placeholder="Confirm your password">
            </div>
            <div>
                <button type="submit"
                    class="px-4 py-2 w-full text-sm font-medium text-white rounded-md shadow-sm bg-neutral-800 hover:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">
                    Register
                </button>
            </div>
        </form>
        <p class="mt-4 text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('showLoginForm') }}" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>
</body>

</html>
