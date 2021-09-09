<?php

namespace App\OnlineShopping\Models;

use DB ;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\MyHelper\Helper;

use App\Traits\TranslateJsonFields ;

class Product extends Model {
    use TranslateJsonFields ;
    protected array $TranslateJsonFields = [ 'name' , 'description' ];
    protected $casts = [
        'is_available' => 'boolean'
    ];

    /**
     * Change Product Availability
     * @return self
    */
    public function ChangeAvailable( bool $status ) : Product {
        $this -> is_available = $status ;
        $this -> save( ) ;
        return $this -> refresh( ) ;
    }

    /**
     * make Product NotAvailable 
     * @return self
    */
    public function beNotAvailable( ) : Product {
        return $this -> ChangeAvailable( false ) ;
    }

    /**
     * make Product NotAvailable 
     * @return self
    */
    public function beAvailable( ) : Product {
        return $this -> ChangeAvailable( true ) ;
    }

    /**
     * toggle Product Availability 
     * @return self
    */
    public function toggleAvailable( ) : Product {
        return $this -> ChangeAvailable( ! $this -> is_available ) ;
    }

    /**
     * scope Product Available is true
     * @return Builder
    */
    public function scopeAvailables( Builder $Builder ) : Builder {
        return $Builder -> where( 'is_available' , 1 ) ;
    }

    /**
     * scope Product not Available is true
     * @return Builder
    */
    public function scopeNotAvailables( Builder $Builder ) : Builder {
        return $Builder -> where( 'is_available' , 0 ) ;
    }

    /**
     * check quantity Product Availability 
     * @return bool
    */
    public function isQuantityAvailable( int $quantity = 1 ) : bool {
        return $this -> quantity > $quantity ;
    }

    /**
     * add quantity Product 
     * @return bool
    */
    public function addQuantity( int $quantity = 1 ) : Product {
        $this -> increment( 'quantity' , $quantity );
        return $this -> refresh( ) ;
    }

    /**
     * remove quantity Product 
     * @return bool
    */
    public function removeQuantity( int $quantity = 1 ) : Product {
        $this -> decrement( 'quantity' , $quantity );
        return $this -> refresh( ) ;
    }

    /**
     * scope Product have quantity is true
     * @return Builder
    */
    public function scopenotHaveQuantity( Builder $Builder ) : Builder {
        return $Builder -> where( 'quantity' , '=' , 0 ) ;
    }

    /**
     * scope Product on quantity is true
     * @return Builder
    */
    public function scopehaveQuantity( Builder $Builder ) : Builder {
        return $Builder -> where( 'quantity' , '>=' , 1 ) ;
    }

    /**
     * scope Products can Available To Show
     * @return Builder
    */
    public function scopeAvailableToShow( Builder $Builder ) : Builder {
        return $Builder
            -> Availables   ( )
            -> haveQuantity ( )
        ;
    }

    /**
     * scope Products can Available To Show
     * @return Builder
    */
    public function scopepriceBetween( Builder $Builder , float $price_from = 0 , float $price_to = 9E9 ) : Builder {
        return $Builder -> whereBetween( 'price' , [ $price_from , $price_to ] )
        ;
    }

    /**
     * scope Products can Available To Show
     * @return Builder
    */
    public function scopeinLocations( Builder $Builder , float $latitude = 0.0 , float $longitude = 0.0 ) : Builder {
        $select = '( 6367 * acos(
            cos( radians( ' . $latitude . ' )                                 ) *
            cos( radians( latitude          )                                 ) *
            cos( radians( longitude         ) - radians( ' . $longitude . ' ) ) +
            sin( radians( ' . $latitude . ' )                                 ) *
            sin( radians( latitude          )                                 )
        ) ) AS distance ' ;
        return $Builder
            -> select    ( '*'                )
            -> selectRaw ( DB::raw( $select ) )
            -> havingRaw ( 'distance < ?'  , [ Helper::settingValue( 'search_area' , 7.00 ) ] )
        ;
    }

    /**
     * Relations between Products and Cart on Cart OnlineShopping
     * @return BelongsTo
     */
    public function category( ) : BelongsTo {
        return $this -> BelongsTo( Category::class ) ;
    }

}