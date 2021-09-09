<?php

namespace App\OnlineShopping\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCollectionRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */
    public function rules( ) {
        return [
            'category_id' => [ 'nullable' , 'integer' , 'exists:online_shopping_categories,id' ] ,
            'currency'    => [ 'nullable' , 'string'                                           ] ,
            'price_from'  => [ 'nullable' , 'numeric' , 'min:0'                                ] ,
            'price_to'    => [ 'nullable' , 'numeric' , 'max:9E9'                              ] ,
            'latitude'    => [ 'nullable' , 'numeric' , 'min:-360' , 'max:360'                 ] ,
            'longitude'   => [ 'nullable' , 'numeric' , 'min:-360' , 'max:360'                 ] ,
            'word'        => [ 'nullable' , 'array'                                            ] ,
            'word.*'      => [ 'string'   , 'min:1'   , 'max:100'                              ] ,
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation( ) {
        $attributesArray = [ ] ;
        if ( $this -> category_id ) $attributesArray [ 'category_id' ] = $this -> category_id ;
        if ( $this -> currency    ) $attributesArray [ 'currency'    ] = $this -> currency    ;
        $this -> merge( [ 'attributesArray' => collect( $attributesArray ) ] );
    }

}
