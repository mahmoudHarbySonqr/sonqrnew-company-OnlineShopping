<?php

namespace App\OnlineShopping\Traits\Client;

use App\OnlineShopping\Models\Cart ;
use Illuminate\Database\Eloquent\Relations\HasOne ;

trait ClientOnlineShoppingTraits{

    /**
     * Relations between Client and Cart on OnlineShopping
     * @return HasOne
     */
    public function OnlineShoppingCart( ) : HasOne {
        return $this -> hasOne( Cart::class ) ;
    }

    /**
     * get Cart if exists or create new one
     * @return HasOne
     */
    public function getOnlineShoppingCart( ) : Cart {
        if ( ! $this -> OnlineShoppingCart( ) -> exists( ) ) $this -> OnlineShoppingCart( ) -> create( ) ;
        return $this -> OnlineShoppingCart ;
    }

}