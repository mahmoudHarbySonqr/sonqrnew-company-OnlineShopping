<?php

namespace App\OnlineShopping\Resources\Response\Collections;

use App\OnlineShopping\Resources\Response\Abstracts\ResourceCollection ;

use App\OnlineShopping\Resources\Response\Jsons\CategoryResource ;

class CategoryCollection extends ResourceCollection{

    public function toArray( $request ) {
        return $this -> collection -> map( fn( $Category ) => new CategoryResource ( $Category ) );
    }

}