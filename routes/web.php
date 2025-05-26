<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\CheckMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/home-page', function () {
    // // return view('home');
    // $name = "<h1>laravel</h1>";
    // $user = [
    //     'name' => "Rifki Ilham Lutfika",
    //     'email' => "adaajalah@ms.com",
    //     'role' => 'ka'
    // ];
    // $movieCategory = 'kaj';
    // $movies = [
    //     ['title' => 'Boboiboy', 'year' => 2017],
    //     ['title' => 'naruto', 'year' => 2002],
    //     ['title' => 'dragon ball', 'year' => 1986],
    //     ['title' => 'ejen ali', 'year' => 2015],
    //     ['title' => 'upin ipin', 'year' => 2010],
    //     ['title' => 'siamang tunggal', 'year' => 2011],
    //     ['title' => 'avenger', 'year' => 2012],
    //     ['title' => 'captain marvel', 'year' => 2019],
    //     ['title' => 'end game', 'year' => 2019],
    //     ['title' => 'cars', 'year' => 2006],
    //     ['title' => 'tangled', 'year' => 2008],
    // ];

    return view('home');
});

Route::get('/', function () {
    $movies = [
        [
            'title' => 'Oppenheimer',
            'description' => 'A historical drama following the life of J. Robert Oppenheimer, the physicist who helped develop the atomic bomb during World War II.',
            'release_date' => '2023-07-21',
            'cast' => ['Cillian Murphy', 'Emily Blunt', 'Matt Damon', 'Robert Downey Jr.', 'Florence Pugh'],
            'genres' => ['Drama', 'History', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg',
        ],
        [
            'title' => 'Barbie',
            'description' => 'Barbie suffers a crisis that leads her to question her world and her existence, taking her on a journey to the real world.',
            'release_date' => '2023-07-21',
            'cast' => ['Margot Robbie', 'Ryan Gosling', 'Simu Liu', 'America Ferrera', 'Kate McKinnon'],
            'genres' => ['Comedy', 'Fantasy'],
            'image' => '',
        ],
        [
            'title' => 'Mission: Impossible - Dead Reckoning Part One',
            'description' => 'Ethan Hunt and his IMF team must track down a terrifying new weapon that threatens all of humanity if it falls into the wrong hands.',
            'release_date' => '2023-07-12',
            'cast' => ['Tom Cruise', 'Hayley Atwell', 'Ving Rhames', 'Simon Pegg', 'Rebecca Ferguson'],
            'genres' => ['Action', 'Adventure', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/NNxYkU70HPurnNCSiCjYAmacwm.jpg',
        ],
        [
            'title' => 'Spider-Man: Across the Spider-Verse',
            'description' => 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its existence.',
            'release_date' => '2023-06-02',
            'cast' => ['Shameik Moore', 'Hailee Steinfeld', 'Oscar Isaac', 'Jake Johnson', 'Issa Rae'],
            'genres' => ['Animation', 'Action', 'Adventure'],
            'image' => 'https://image.tmdb.org/t/p/w500/8Vt6mWEReuy4Of61Lnj5Xj704m8.jpg',
        ],
        [
            'title' => 'John Wick: Chapter 4',
            'description' => 'With the price on his head ever increasing, John Wick uncovers a path to defeating The High Table.',
            'release_date' => '2023-03-24',
            'cast' => ['Keanu Reeves', 'Donnie Yen', 'Bill Skarsgård', 'Laurence Fishburne', 'Ian McShane'],
            'genres' => ['Action', 'Crime', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg',
        ],
        [
            'title' => 'Guardians of the Galaxy Vol. 3',
            'description' => 'The Guardians embark on a mission to protect one of their own and face new challenges as they unravel the mysteries of the universe.',
            'release_date' => '2023-05-05',
            'cast' => ['Chris Pratt', 'Zoe Saldana', 'Dave Bautista', 'Bradley Cooper', 'Karen Gillan'],
            'genres' => ['Action', 'Adventure', 'Comedy'],
            'image' => 'https://image.tmdb.org/t/p/w500/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg',
        ],
        [
            'title' => 'The Flash',
            'description' => 'Barry Allen uses his super speed to change the past, but his attempt to save his family creates a world without superheroes.',
            'release_date' => '2023-06-16',
            'cast' => ['Ezra Miller', 'Michael Keaton', 'Sasha Calle', 'Ben Affleck', 'Ron Livingston'],
            'genres' => ['Action', 'Adventure', 'Fantasy'],
            'image' => 'https://image.tmdb.org/t/p/w500/3GrRgt6CiLIUXUtoktcv1g2iwT5.jpg',
        ],
        [
            'title' => 'Fast X',
            'description' => 'Dom Toretto and his family are targeted by the vengeful son of drug kingpin Hernan Reyes, Dante, who seeks to destroy everything Dom loves.',
            'release_date' => '2023-05-19',
            'cast' => ['Vin Diesel', 'Michelle Rodriguez', 'Jason Momoa', 'Tyrese Gibson', 'Ludacris'],
            'genres' => ['Action', 'Crime', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/1E5baAaEse26fej7uHcjOgEE2t2.jpg',
        ],
        [
            'title' => 'Indiana Jones and the Dial of Destiny',
            'description' => 'Archaeologist Indiana Jones races against time to retrieve a legendary artifact that can change the course of history.',
            'release_date' => '2023-06-30',
            'cast' => ['Harrison Ford', 'Phoebe Waller-Bridge', 'Mads Mikkelsen', 'Boyd Holbrook', 'Antonio Banderas'],
            'genres' => ['Adventure', 'Action'],
            'image' => 'https://image.tmdb.org/t/p/w500/Af4bXE63pVsb2FtbW8uYIyPBadD.jpg',
        ],
        [
            'title' => 'Transformers: Rise of the Beasts',
            'description' => 'During the 1990s, the Autobots encounter a new faction of Transformers known as the Maximals, who join them as allies in the battle for Earth.',
            'release_date' => '2023-06-09',
            'cast' => ['Anthony Ramos', 'Dominique Fishback', 'Peter Cullen', 'Ron Perlman', 'Peter Dinklage'],
            'genres' => ['Action', 'Science Fiction', 'Adventure'],
            'image' => 'https://image.tmdb.org/t/p/w500/gPbM0MK8CP8A174rmUwGsADNYKD.jpg',
        ]
    ];

    return view('welcome', ['movies' => $movies]);
});

$movies = [];

Route::group([
    // "middleware" => ["isAuth", "isMember"],
    "prefix" => "movies", //ini bakal jadi path selanjutnya jadi https://movie.test/prefix nya/
    "as" => "movie."
], function () use ($movies) {
    Route::get("/", [MovieController::class, "index"])->name('index'); //nama class -> terus method yang ingin dipakai
    Route::get("/create", [MovieController::class, "create"])->name('create');
    Route::get("/{id}", [MovieController::class, "show"])->name('show'); //->middleware(['isMember']);
    Route::post("/", [MovieController::class, "store"])->name('store');
    Route::get("/{id}/edit", [MovieController::class, "edit"])->name('edit');
    Route::put("/{id}", [MovieController::class, "update"])->name('update');
    // Route::patch("/{id}", [MovieController::class, "update"]);
    Route::delete("/{id}", [MovieController::class, "destroy"])->name('destroy');
});

Route::get("/pricing", function () {
    return "please, buy a membership";
});

Route::get("/login", function () {
    return "Login Page";
})->name("login-page"); //bisa dinamakan alias dari route

Route::post("/request", function (Request $request) {
    // dd($request);
    // return $request->schemeAndHttpHost();
    // echo $request->query('parameters', "ilham");
    // if ($request->is("request")) {
    //     return true;
    // }
    // return $request->all();
    // $user = $request->all();
    // return $user["name"];

    // dd($request->collect());

    // $filtered = $request->collect()->filter(function ($value, $key) {
    //     return is_numeric($value);
    // });

    // $filtered = $request->collect()->map(function ($value) {
    //     return strtoupper($value);
    // });

    // $filtered = $request->collect()->has("merriage");

    // $filtered = $request->collect()->only(['name', 'gender']);

    // return $filtered;

    // $input = $request->input(); //hanya bisa pakai method post
    // $input = $request->input('colors.1');
    // $input = $request->input('colors.*');
    // return $input;

    // $query = $request->query();
    // return $query;

    // $data = $request->date("schedule", 'Y-m-d', 'Asia/Jakarta')->addDay()->addUTCHour(0);
    // // dd(gettype($data));
    // return $data->diffForHumans();

    $data = $request->all();
    // if ($request->has('name')) {
    //     return "Name : " . $request->input('name');
    // }
    // if ($request->has(['name', 'age'])) { //&& AND
    //     return "oke";
    // }
    // if ($request->hasAny(['name', 'age'])) { //OR
    //     return "oke";
    // }

    $request->merge(['name' => 'ilham']);

    if ($request->missing('name')) {
        return "name nya gak ada";
    } else {
        return "datanya ada";
    }

    // return "apalah";
});

Route::get("/response", function () {
    return response("ok")->header("content-type", 'plain/text');
});

Route::get("/cache-control", function () {
    return Response::make("page allow to cache", 200)
        ->header('cache-control', 'public, max-age=86400');
});

Route::middleware('cache.headers:public;max_age=1;etag')->group(function () {
    Route::get('/privacy', function () {
        return "privacy page";
    });

    Route::get('/terms', function () {
        return "terms page";
    });

    Route::get("/dashboard", function () {
        $user = "[
            'name' => 'John Doe',
            'email' => 'asijdijd@nemail.com',
            'is_member' => true
        ]";

        return response('Login succesfuly', 200)->cookie('user', $user);
    });

    Route::get("/logout", function () {
        // return response("logout successfuly", 200)
        //     ->withoutCookie('user', null);

        // return redirect()->route('home', ['src' => 'logout'])->withoutCookie('user');

        return redirect()->action(
            [HomeController::class, "index"],
            ['authenticated' => false]
        );
    });

    Route::get("/home", [HomeController::class, "index"])->name('home');
});

Route::get("/external", function () {
    // return redirect()->away('https://www.youtube.com/live/vL7NnVupI7I?si=0rPKR3mNO2T19he3');
    return redirect("/");
});

Route::get('/session', function (Request $request) {
    // $request->session()->put('is_membership', 'tidakkkk'); //bisa digunakan untuk simpan
    // session([
    //     'is_membership' => 'yes'
    // ]);
    // return session('is_membership');

    session(['days' => ['friday', 'monday', 'wednesday']]);
    session()->push('days', 'saturday');
    session()->put('days', array_diff(session('days'), ['monday']));
    session()->forget('days');
    session()->put('is_membership', true);
    session()->forget('is_membership');
    return $request->session()->all();
});
