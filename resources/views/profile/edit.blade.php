<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center items-center px-4 min-h-screen bg-gray-50">
    <div class="p-6 w-full max-w-md bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Profile</h1>
            <a href="{{ route('profile.show', $profile) }}"
                class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700">
                Back
            </a>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                <button class="float-right text-green-700"
                    onclick="this.parentElement.style.display='none'">&times;</button>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update', $profile) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('address', $profile->address) }}" placeholder="Enter your address">
                @error('address')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                <input type="text" name="position" id="position" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('position', $profile->position) }}" placeholder="Enter your position">
                @error('position')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" required
                    class="block px-3 py-2 mt-1 w-full text-sm rounded-md border border-gray-300 shadow-sm focus:ring-neutral-500 focus:border-neutral-500"
                    value="{{ old('phone', $profile->phone) }}" placeholder="Enter your phone number">
                @error('phone')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="px-4 py-2 w-full text-sm font-medium text-white rounded-md shadow-sm bg-neutral-800 hover:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">
                Update Profile
            </button>
        </form>
    </div>
</body>

</html>
