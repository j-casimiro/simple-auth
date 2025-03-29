<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Hero Section -->
    <div class="py-16 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                    About Us
                </h1>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">
                    We're passionate about creating amazing experiences and building the future of technology.
                </p>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-3xl font-bold text-indigo-600">Our Mission</h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus magnam voluptatum cupiditate
                    veritatis in accusamus quisquam.
                </p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="py-16 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12 lg:text-center">
                <h2 class="text-3xl font-bold text-gray-900">Meet Our Team</h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    The amazing people who make it all possible.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 md:grid-cols-3">
                <!-- Team Member 1 -->
                <div class="text-center">
                    <div class="space-y-4">
                        <img class="mx-auto w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff&size=160"
                            alt="John Doe">
                        <div class="space-y-2">
                            <div class="text-lg font-medium leading-6">
                                <h3 class="text-gray-900">John Doe</h3>
                                <p class="text-indigo-600">CEO</p>
                            </div>
                            <div class="text-gray-500">
                                <p>Passionate about building great products and leading teams.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="text-center">
                    <div class="space-y-4">
                        <img class="mx-auto w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name=Jane+Smith&background=4f46e5&color=fff&size=160"
                            alt="Jane Smith">
                        <div class="space-y-2">
                            <div class="text-lg font-medium leading-6">
                                <h3 class="text-gray-900">Jane Smith</h3>
                                <p class="text-indigo-600">CTO</p>
                            </div>
                            <div class="text-gray-500">
                                <p>Technology enthusiast with 10+ years of experience.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="text-center">
                    <div class="space-y-4">
                        <img class="mx-auto w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name=Mike+Johnson&background=4338ca&color=fff&size=160"
                            alt="Mike Johnson">
                        <div class="space-y-2">
                            <div class="text-lg font-medium leading-6">
                                <h3 class="text-gray-900">Mike Johnson</h3>
                                <p class="text-indigo-600">Lead Developer</p>
                            </div>
                            <div class="text-gray-500">
                                <p>Full-stack developer focused on creating elegant solutions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Go Back Button -->
    <div class="py-8 bg-white">
        <div class="px-4 mx-auto max-w-7xl text-center sm:px-6 lg:px-8">
            <a href="{{ url('/') }}"
                class="inline-block px-6 py-3 text-white bg-blue-500 rounded transition-colors hover:bg-blue-600">
                Go Back to Welcome Page
            </a>
        </div>
    </div>

</body>

</html>
