<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieApp</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 text-white">
    <x-partials.header />

    <div class="min-h-screen flex">
        <aside class="w-64 bg-gray-800 p-6 text-white">
            {{ $sidebar }}
        </aside>

        <main class="flex-1 p-6 bg-gray-900">
            {{ $slot }}
        </main>
    </div>

    {{-- <section class="container mx-auto p-5">
        {{ $slot }}
    </section> --}}
</body>

</html>
