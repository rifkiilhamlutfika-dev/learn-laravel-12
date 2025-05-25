<x-app>
    {{-- <div class="bg-blue-500 text-white py-16 px-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold">Welcome to laravel</h1>
        <p class="text-xl mt-6">This is a simple example of laravel 12</p>
    </div> --}}

    <x-slot name='sidebar'>
        <x-partials.sidebar :menus="[
            ['title' => 'Dashboard', 'link' => '/dashbord'],
            ['title' => 'Profile', 'link' => '/profile'],
            ['title' => 'Settings', 'link' => '/settings'],
        ]" />
    </x-slot>

    {{-- kalo yang ini pasti bakal kebaca yang $slot --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
        @foreach ($movies as $movie)
            <x-movie.card :index="$loop->index" :title="$movie['title']" :image="$movie['image']" :releaseDate="$movie['release_date']" />
        @endforeach
    </div>
</x-app>
