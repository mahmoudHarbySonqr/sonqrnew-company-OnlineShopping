<?php

namespace App\OnlineShopping\Resources\Response\Abstracts;

use Illuminate\Http\Resources\Json\ResourceCollection as Resources;

Abstract class ResourceCollection extends Resources{
    public function with( $request ) {
        return [
            'message' => 'Successful.' ,
            'check'   => true          ,
        ];
    }
}