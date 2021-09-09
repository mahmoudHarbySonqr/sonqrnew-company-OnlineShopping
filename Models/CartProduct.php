<?php

namespace App\OnlineShopping\Models;


class CartProduct extends Model {
    protected $fillable = [
        'product_id' ,
        'quantity'   ,
    ];
}