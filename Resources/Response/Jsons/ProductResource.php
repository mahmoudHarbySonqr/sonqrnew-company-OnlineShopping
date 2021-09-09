<?php

namespace App\OnlineShopping\Resources\Response\Jsons;

use App\OnlineShopping\Resources\Response\Abstracts\JsonResource ;

class ProductResource extends JsonResource{
    public function toArray( $request ) {
        return[
            'id'           => $this -> id           ,
            'name'         => $this -> name         ,
            'description'  => $this -> description  ,
            'price'        => $this -> price        ,
            'currency'     => $this -> currency     ,
            'is_available' => $this -> is_available ,
            'quantity'     => $this -> quantity     ,
            'category'     => new CategoryResource ( $this -> category ) ,
        ] ;
    }

}