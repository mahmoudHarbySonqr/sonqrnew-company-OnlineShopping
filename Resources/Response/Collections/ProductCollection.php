<?php

namespace App\OnlineShopping\Resources\Response\Collections;

use App\OnlineShopping\Resources\Response\Abstracts\ResourceCollection ;

use App\OnlineShopping\Resources\Response\Jsons\ProductResource ;

class ProductCollection extends ResourceCollection{

    public function toArray( $request ) {
        return $this -> collection -> map( fn( $Product ) => new ProductResource ( $Product ) );
    }

}