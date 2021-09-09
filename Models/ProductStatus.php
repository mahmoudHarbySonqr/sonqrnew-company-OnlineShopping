<?php

namespace App\OnlineShopping\Models;
use App\Traits\TranslateJsonFields ;
class ProductStatus extends Model {
    use TranslateJsonFields ;
    protected array $TranslateJsonFields = [ 'name' ];
}