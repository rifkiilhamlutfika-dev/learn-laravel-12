<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\CheckMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$movies = [];

Route::group([
    // "middleware" => ["isAuth", "isMember"],
    "prefix" => "movies", //ini bakal jadi path selanjutnya jadi https://movie.test/prefix nya/
    "as" => "movie."
], function () use ($movies) {

    Route::get("/", function () use ($movies) {
        return $movies;
    });

    Route::get("/", [MovieController::class, "index"]); //nama class -> terus method yang ingin dipakai

    Route::get("/{id}", [MovieController::class, "show"]); //->middleware(['isMember']);

    Route::post("/", [MovieController::class, "store"]);

    Route::put("/{id}", [MovieController::class, "update"]);

    Route::patch("/{id}", [MovieController::class, "update"]);

    Route::delete("/{id}", [MovieController::class, "destroy"]);
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
