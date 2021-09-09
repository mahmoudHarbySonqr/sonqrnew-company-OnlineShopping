<?php

namespace App\OnlineShopping\Models;

use App\Traits\TranslateJsonFields ;

class Category extends Model {

    use TranslateJsonFields ;

    protected array $TranslateJsonFields = [ 'name' , 'description' ];

}