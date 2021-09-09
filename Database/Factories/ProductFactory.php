<?php

use App\OnlineShopping\Models\Product;
use App\OnlineShopping\Models\Category;
use Faker\Generator as Faker;
use Faker\Factory;
use App\Models\Store;
use App\Traits\TranslateJsonFields ;

$factory -> define( Product::class , fn ( Faker $faker ) => [
        'price'       => $faker -> numberBetween( 10 , 200 ) ,
        'quantity'    => $faker -> numberBetween( 1  , 10  ) ,
        'currency'    => $faker -> currencyCode(           ) ,
        'created_by'  => ( $Store = factory( Store::class ) -> create ( ) ) -> id ,
        'longitude'   => $Store -> addresses -> first( ) -> longitude ,
        'latitude'    => $Store -> addresses -> first( ) -> latitude  ,
        'category_id' => Category::inRandomOrder( ) -> first( ) -> id ,
        'name' . TranslateJsonFields::$prefixNameFields  => [
            'ar' => Factory::create( 'ar_SA' ) -> title  ,
            'en' => $faker -> title  ,
        ] ,
        'description' . TranslateJsonFields::$prefixNameFields  => [
            'ar' => Factory::create( 'ar_SA' ) -> word(  )  ,
            'en' => $faker -> word(  )  ,
        ] ,
    ]
);
