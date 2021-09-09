<?php

namespace App\OnlineShopping\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\OnlineShopping\Controllers\ControllerTraits\ResponsesTrait;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests , ResponsesTrait;
}
