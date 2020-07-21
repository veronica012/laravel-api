<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //con questo costruttore sappiamo che tutte le rotte in web.php gestite dall'home controller sono protette dal middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function account() {
        return view('account');
    }

    public function generateToken() {
//genero una stringa random che devo salvare nello user corrente
        $random_token = Str::random(80);
        //recupero l'utente corrente
        $utente_corrente = Auth::user(); //è la stessa funzione che uso in account.blade
//associo all'utente il token
        $utente_corrente->api_token = $random_token;
        $utente_corrente->save();
        return redirect()->route('admin.account');

    }
}
