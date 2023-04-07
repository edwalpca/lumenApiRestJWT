<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

            //dd($this->auth );
            //validacion del JWT
            if ($this->auth->guard($guard)->guest()) {
                return response('No Autorizado.', 401);
            }

            //Validacion adicional agregada que debe venir el el header de la peticion
            if ($request->header('apiKeyCliente')) {

            }else{

                return response('No Autorizado - Falta el apiKey del Cliente.', 401);

            }
            return $next($request);

    }
}
