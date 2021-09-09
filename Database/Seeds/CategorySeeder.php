<?php

namespace App\OnlineShopping\Database\Seeds;

use Illuminate\Database\Seeder;
use App\OnlineShopping\Models\Category;
use App\Traits\TranslateJsonFields;

class CategorySeeder extends Seeder {
    public function run( ) {
        collect( [
            [ 'sort' => $sort = 1 , 'name' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'شاشات'       , 'en' => 'screens'          ] , 'description' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'قسم شاشات'      , 'en' => 'Category screens'          ] ] ,
            [ 'sort' => ++$sort   , 'name' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'ثلاجات'        , 'en' => 'refrigerators'    ] , 'description' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'قسم ثلاجات'       , 'en' => 'Category refrigerators'    ] ] ,
            [ 'sort' => ++$sort   , 'name' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'غسالات'       , 'en' => 'washing machines' ] , 'description' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'قسم غسالات'      , 'en' => 'Category washing machines' ] ] ,
            [ 'sort' => ++$sort   , 'name' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'كمبيوتر محمول' , 'en' => 'laptop'           ] , 'description' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'قسم كمبيوتر محمول' , 'en' => 'Category laptop'           ] ] ,
            [ 'sort' => ++$sort   , 'name' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'كمبيوتر مكتبي'  , 'en' => 'desktop computer' ] , 'description' . TranslateJsonFields::$prefixNameFields => [ 'ar' => 'قسم كمبيوتر مكتبي' , 'en' => 'Category desktop computer' ] ] ,
        ] ) -> map( fn( array $Category ) => Category::create( $Category ) ) ;
    }
}
