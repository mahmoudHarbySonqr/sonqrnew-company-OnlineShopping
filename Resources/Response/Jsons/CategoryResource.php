<?php

namespace App\OnlineShopping\Resources\Response\Jsons;

use App\OnlineShopping\Resources\Response\Abstracts\JsonResource ;

class CategoryResource extends JsonResource{
    public function toArray( $request ) {
        return [
            'id'          => $this -> id          ,
            'name'        => $this -> name        ,
            'description' => $this -> description ,
            'sort'        => $this -> sort        ,
            'avatar_url'  => [ 'https://via.placeholder.com/400' ] ,
        ];
    }
}