<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware as ControllersMiddleware;

class MovieController extends Controller implements HasMiddleware
{
    public $movies = [];

    public static function middleware()
    {
        // return [
        //     'isAuth',
        //     // new ControllersMiddleware("isMember", only:['show', 'update', 'destroy']) //hanya
        //     new ControllersMiddleware("isMember", except: ['index']) //kecuali
        // ];
    }

    public function __construct()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->movies[] = [
                "title" => "Movie controller $i",
                "year" => "2002"
            ];
        }
    }

    public function index()
    {
        // return $this->movies;
        // return response()->json([
        //     'message' => "successfuly get data",
        //     'movies' => $this->movies,
        // ], 200);
        $movies = $this->movies;
        // return view("movies.index", ['movies' => $movies]);
        // return view("movies.index", compact('movies')); //bakal cari nama yang sama
        // return view("movies.index")->with('movies', $movies);
        // return view("movies.index")->with(['movies' => $movies]);
        return view("movies.index", compact('movies'))->with([
            'titlePage' => "Movie list"
        ]);
    }

    public function show($id)
    {
        $movie = $this->movies[$id];
        return view("movies.show", ['movie' => $movie]);
    }

    public function store()
    {
        $this->movies[] = [
            "title" => request("title"),
            "year" => request("year")
        ];

        return $this->movies;
    }

    public function update(Request $request, $id)
    {
        // $this->movies[$id] = [
        //     "title" => request("title"),
        //     "year" => request("year")
        // ];

        // return $this->movies;

        return $request->all();
    }

    public function destroy($id)
    {
        unset($this->movies[$id]);
        return $this->movies;
    }
}
