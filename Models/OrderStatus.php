<?php

namespace App\OnlineShopping\Models;
use App\Traits\TranslateJsonFields ;
class OrderStatus extends Model {
    use TranslateJsonFields ;
    protected array $TranslateJsonFields = [ 'name' , 'description' ];
}