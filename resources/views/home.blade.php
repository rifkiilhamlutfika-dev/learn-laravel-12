<ul?php $greeting = 'Hello Cuy'; ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Homepage</title>
        {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}

    </head>

    <body>
        <ul>
            <?php foreach ($menu as $key => $value): ?>
            <li><a href="<?php $value; ?>"><?php echo $key; ?></a></li>
            <?php endforeach; ?>
        </ul>
        {{ $name }} {{-- hanya membaca sebagai string saja --}}
        {!! $name !!} {{-- tag html nya kebaca --}}

        Profile :
        <ul>
            <li>Name : {{ $user['name'] }}</li>
            <li>Email : {{ $user['email'] }}</li>
            <li>Role :
                {{ $user['role'] == 'admin' ? 'Administrator' : ($user['role'] == 'user' ? 'User' : 'lu saha?') }}
            </li>

            {{-- @if ($user['role'] == 'admin')
            <li>Role : administrator</li>
        @elseif($user['role'] == 'user')
            <li>Role : User</li>
        @else
            <li>Role : lu saha?</li>
        @endif --}}

            <h2>Movie Category</h2>

            @switch($movieCategory)
                @case('action')
                    <h4>Action Movie</h4>
                @break

                @case('comedy')
                    <h4>Comedy</h4>
                @break

                @default
                    <h4>Category Not Found</h4>
            @endswitch
        </ul>
        <ul>
            {{-- @for ($i = 0; $i < count($movies); $i++)
                <li>{{ $movies[$i]['title'] }} - {{ $movies[$i]['year'] }}</li>
            @endfor --}}

            @foreach ($movies as $movie)
                {{-- @if ($movie['year'] < 2010) --}}
                {{-- @continue --}}
                {{-- kalo ketemu maka lanjut aja (tidak ditampilkan) --}}
                {{-- @break --}}

                {{-- kalo ketemu 1 aja langsung diberhentikan proses di bawah nya --}}
                {{-- @endif --}}
                {{-- $loop ada di looping --}}
                {{-- @if ($loop->first)
                    <li>First Movie : {{ $movie['title'] }} - {{ $movie['year'] }}</li>
                @elseif ($loop->last)
                    <li>Last Movie : {{ $movie['title'] }} - {{ $movie['year'] }}</li>
                @else
                    <li>{{ $loop->iteration }} {{ $movie['title'] }} - {{ $movie['year'] }}</li>
                @endif --}}

                {{-- <p>Movie : {{ $loop->index + 1 }} of {{ $loop->count }} : {{ $movie['title'] }} - {{ $movie['year'] }}
                </p> --}}
                {{-- {{ $loop->remaining }} --}}

                {{-- <p class="{{ $loop->first ? 'font-bold' : ($loop->last ? 'italic' : '') }}">
                    {{ $movie['title'] }} - {{ $movie['year'] }}
                </p> --}}

                @include('partials._movie', ['movie' => $movie])
            @endforeach

            {{-- @forelse ($movies as $movie)
                <li>{{ $movie['title'] }} - {{ $movie['year'] }}</li>
            @empty
                <li>No Movies Found</li>
            @endforelse --}}

            {{-- @php
                $index = 0;
            @endphp

            @while ($index < count($movies))
                <li>{{ $movies[$index]['title'] }} - {{ $movies[$index]['year'] }}</li>
                @php
                    $index++;
                @endphp
            @endwhile --}}
        </ul>
    </body>

    </html>
