<?php

namespace App\OnlineShopping\Controllers\ControllerTraits;

use Illuminate\Http\Response ;
use Illuminate\Http\JsonResponse ;

trait ResponsesTrait {

    public function MakeResponse( string $msg , bool $check = true , int $code = Response::HTTP_OK , array $data = [ ] , array $errors = [ ] , array $array = [ ] ) : JsonResponse {
        if( ! empty( $data   ) ) $array [ 'data'   ] = $data   ;
        if( ! empty( $errors ) ) $array [ 'errors' ] = $errors ;
        return \Response::json( [
            'message' => $msg   ,
            'check'   => $check ,
        ] + $array , $code );
    }

    public function MakeResponseSuccessful( array $data   = [ ] , string $msg   = 'Successful.' , int $code = Response::HTTP_OK                   ) : JsonResponse {
        return $this -> MakeResponse( $msg , true , $code , $data );
    }

    public function MakeResponseErrors    ( array $Errors = [ ] , string $Error = 'Errors.'     , int $code = Response::HTTP_UNPROCESSABLE_ENTITY ) : JsonResponse {
        return $this -> MakeResponse( $Error , false , $code , [ ] , $Errors + [ $Error ] );
    }

}