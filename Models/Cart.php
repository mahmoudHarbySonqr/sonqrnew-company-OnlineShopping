<?php

namespace App\OnlineShopping\Models;

use App\OnlineShopping\OverWriting\Migration;

use App\OnlineShopping\Models\Product;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Pagination\LengthAwarePaginator ;

class Cart extends Model {

    /**
     * add new Product in cart
     * @return Cart
     */
    public function add( Product $Product , int $quantity = 1 ) : Cart {
        if ( ! $Product -> is_available                     ) return $this -> refresh( ) ;
        if ( ! $Product -> isQuantityAvailable( $quantity ) ) return $this -> refresh( ) ;
        $qurey = $this -> CartProducts( ) -> where( 'product_id' , $Product -> id ) ;
        if ( $qurey -> exists( ) ) $qurey -> increment( 'quantity' , $quantity );
        else $qurey -> create( [ 'product_id' => $Product -> id , 'quantity' => $quantity ] ) ;
        return $this -> refresh( ) ;
    }

    /**
     * Relations between Cart and Cart on Cart OnlineShopping
     * @return hasMany
     */
    public function CartProducts( ) : hasMany {
        return $this -> hasMany( CartProduct::class ) ;
    }

    /**
     * Relations between Products and Cart on Cart OnlineShopping
     * @return BelongsToMany
     */
    public function Products( ) : BelongsToMany {
        return $this -> belongsToMany( Product::class , CartProduct::class ) ;
    }

}