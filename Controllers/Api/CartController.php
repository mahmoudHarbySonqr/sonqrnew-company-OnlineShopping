<?php

namespace App\OnlineShopping\Controllers\Api;

use App\OnlineShopping\Controllers\Controller;

use Illuminate\Http\Response ;
use Illuminate\Http\Request;
use App\OnlineShopping\Models\Product;
use App\OnlineShopping\Models\CartProduct;
use App\OnlineShopping\Resources\Response\Collections\ProductCollection ;

use Auth ;

class CartController extends Controller {

    public function addProduct( int $product_id , int $quantity = 1 ) {
        if ( is_null( $Product = Product::find( $product_id ) ) ) return $this -> MakeResponse( __( 'OnlineShopping::Cart.addProduct.ProductNotExists'    ) , false , Response::HTTP_NOT_FOUND            ) ;
        if ( ! $Product -> is_available                         ) return $this -> MakeResponse( __( 'OnlineShopping::Cart.addProduct.ProductNotAvailable' ) , false , Response::HTTP_UNPROCESSABLE_ENTITY ) ;
        if ( ! $Product -> isQuantityAvailable( $quantity )     ) return $this -> MakeResponse( __( 'OnlineShopping::Cart.addProduct.ProductNotAvailable' ) , false , Response::HTTP_UNPROCESSABLE_ENTITY ) ;
        Auth::user( ) -> getOnlineShoppingCart ( ) -> add( $Product , $quantity ) ;
        return $this -> MakeResponseSuccessful( [ ] , __( 'OnlineShopping::Cart.addProduct.Successful' ) , Response::HTTP_ACCEPTED ) ;
    }

    public function getProducts( Request $Request ) {
        return new ProductCollection(
            Auth::user               ( )
            -> getOnlineShoppingCart ( )
            -> Products              ( )
            -> orderBy               ( 'created_at' , $Request -> get( 'orderType' , 'ASC' ) )
            -> paginate              (                $Request -> get( 'pre_page'  , 15    ) )
        ) ;
    }

}
