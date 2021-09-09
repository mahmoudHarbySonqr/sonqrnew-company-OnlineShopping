<?php

namespace App\OnlineShopping\Controllers\Api;

use App\OnlineShopping\Controllers\Controller;
use App\OnlineShopping\Resources\Response\Collections\CategoryCollection ;
use App\OnlineShopping\Models\Category ;

class CategoryController extends Controller {
    public function all( ) {
        return new CategoryCollection ( Category::paginate( ) ) ;
    }
}
