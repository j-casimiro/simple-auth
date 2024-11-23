<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center items-center px-4 min-h-screen bg-gray-50">
    <div class="p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
        <h1 class="mb-6 text-2xl font-bold text-center text-gray-800">Create Profile</h1>

        <form action="{{ route('profile.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('address') }}" placeholder="Enter your address">
                @error('address')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                <input type="text" name="position" id="position" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('position') }}" placeholder="Enter your position">
                @error('position')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('phone') }}" placeholder="Enter your phone number">
                @error('phone')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="px-4 py-2 w-full text-sm font-medium text-white rounded-md shadow-sm bg-neutral-800 hover:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">
                Create Profile
            </button>
        </form>
    </div>
</body>

</html>
