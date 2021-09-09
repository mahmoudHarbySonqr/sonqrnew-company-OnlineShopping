<?php

namespace App\OnlineShopping\Controllers\Api;

use App\OnlineShopping\Controllers\Controller;
use Illuminate\Http\Request;
use App\OnlineShopping\Models\Product;
use Illuminate\Http\Response ;
use App\OnlineShopping\Resources\Response\Jsons\ProductResource ;
use App\OnlineShopping\Resources\Response\Collections\ProductCollection ;
use Illuminate\Pagination\Paginator;
use App\OnlineShopping\Requests\ProductCollectionRequest ;

class ProductController extends Controller {

    public function show( int $product_id ) {
        if( is_null( $Product = Product :: find( $product_id ) ) ) return $this -> MakeResponseErrors( [ ] , __( 'OnlineShopping::Product.show.ProductNotExists'    ) , Response::HTTP_NOT_FOUND ) ;
        if ( ! $Product -> is_available                          ) return $this -> MakeResponseErrors( [ ] , __( 'OnlineShopping::Product.show.ProductNotAvailable' ) , Response::HTTP_NOT_FOUND ) ;
        if ( ! $Product -> isQuantityAvailable( 0 )              ) return $this -> MakeResponseErrors( [ ] , __( 'OnlineShopping::Product.show.ProductNotAvailable' ) , Response::HTTP_NOT_FOUND ) ;
        return new ProductResource ( $Product ) ;
    }

    public function collection( ProductCollectionRequest $Request ) {
        $query = Product::AvailableToShow( ) ;
        if( $Request -> attributesArray ?? null                        ) $Request -> attributesArray -> map( fn( $value , $key ) => $query -> where( $key , $value ) ) ;
        if( $Request -> price_from      ?? $Request -> price_to        ) $query   -> priceBetween    ( $Request -> get( 'price_from'  , 0   ) , $Request -> get( 'price_to'  , 9E9 ) ) ;
        if( $Request -> latitude        ?? $Request -> longitude       ) $query   -> inLocations     ( $Request -> get( 'latitude'    , 0.0 ) , $Request -> get( 'longitude' , 0.0 ) ) ;
        if( $Request -> word            && ! empty( $Request -> word ) ) $query   -> JsonFieldsWords ( $Request -> word                                                              ) ;
        return new ProductCollection( $query -> paginate ( $Request -> get( 'pre_page' , 15 ) ) ) ;
    }

}