<?php

namespace App\OnlineShopping\Middleware;

use Closure;

class localization {


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request , Closure $next ) {
        \App::setLocale( $request -> headers -> get( 'localization' , \App::getLocale( ) ) ) ;
        return $next( $request );
    }
}
