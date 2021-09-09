<?php

namespace App\OnlineShopping\Middleware;

use Auth;
use Closure;

use Illuminate\Http\Response ;

use App\OnlineShopping\Controllers\ControllerTraits\ResponsesTrait;

class UserAuth {

    use ResponsesTrait ;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request , Closure $next ) {
        if(   ! Auth::guard( 'api_client' ) -> check ( ) ) return $this -> MakeResponse( __( 'OnlineShopping::auth.Unauthenticated' ) , false , Response::HTTP_UNAUTHORIZED ) ;
        $user = Auth::guard( 'api_client' ) -> user  ( ) ;
        if( $user -> status === 'deactivate'             ) return $this -> MakeResponse( __( 'OnlineShopping::auth.deactivate'      ) , false , Response::HTTP_UNAUTHORIZED ) ;
        if( $user -> status === 'notConfirmed'           ) return $this -> MakeResponse( __( 'OnlineShopping::auth.notConfirmed'    ) , false , Response::HTTP_UNAUTHORIZED ) ;
        if(   ! Auth::check ( ) )  Auth::login( $user ) ;
        return $next( $request );
    }

}
