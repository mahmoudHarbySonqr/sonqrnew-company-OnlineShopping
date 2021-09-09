<?php

namespace App\OnlineShopping\Resources\Response\Abstracts;

use Illuminate\Http\Resources\Json\JsonResource as Resources;

Abstract class JsonResource extends Resources {
    public function with( $request ) {
        return [
            'message' => 'Successful.' ,
            'check'   => true          ,
        ];
    }
}