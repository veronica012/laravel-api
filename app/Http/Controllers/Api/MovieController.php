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
}
