<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    //tutte le funzioni che gestiscono le rotte API

    public function index() {
        $movies = Movie::all();
        return response()->json([
            'success' => true,
            'count' => $movies->count(),
            'data' => $movies
        ]);
        //$movie è una collection di oggetti movie
    }

    public function bestmovies() {
        $movies = Movie::where('voto', '>', 3)->orderBy('voto', 'desc')->get();
        return response()->json($movies);
    }

//il parametro dell'url {movie} viene passato alla funzione show (è l'id)
    public function show($id) {
        $movie = Movie::find($id);
        if($movie) {
            return response()->json([
                'success' => true,
                'data' => $movie
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'nessun film con questo id'
            ]);
        }

    }
}
