<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth_header = $request->header('authorization');
        //verifico che ci sia un header di autorizzazione se è presente va avanti
        if(empty($auth_header)) {
            return response()->json([
                'success' => false,
                'error' => 'Api Token mancante'
            ]);
        }

        //per verificare che il token sia valido recupero il Token
        $api_token = substr($api_token, 7);

        $user = User::where('api_token', $api_token)->first();

        if(empty($user)) {
            return response()->json([
                'success' => false,
                'error' => 'Api Token errato'
            ]);
        }
        //se è falso manda avanti la richiesta
        return $next($request);

    }
}
