<?php

namespace App\OnlineShopping\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartProduct extends Model {

    protected $fillable = [
        'product_id' ,
        'quantity'   ,
    ];

    /**
     * Relations between Products and Cart on Cart OnlineShopping
     * @return BelongsTo
     */
    public function Product( ) : belongsTo {
        return $this -> belongsTo( Product::class ) ;
    }

}