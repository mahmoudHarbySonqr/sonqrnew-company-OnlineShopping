<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Traits\TranslateJsonFields ;

class OnlineShoppingProducts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'products' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> bigIncrements      ( 'id'                ) ;
            $table -> integer            ( 'price'             ) -> nullable( ) ;
            $table -> string             ( 'currency'          ) -> nullable( ) ;
            $table -> boolean            ( 'is_available'      ) -> default( 1 ) ;
            $table -> integer            ( 'quantity'          ) -> nullable( ) -> default( 1 );
            $table -> decimal            ( 'longitude' , 8 , 2 ) ;
            $table -> decimal            ( 'latitude'  , 8 , 2 ) ;
            $table -> timestamps         (                     ) ;
            $table -> longText           ( 'name'        . TranslateJsonFields::$prefixNameFields ) -> nullable( ) ;
            $table -> longText           ( 'description' . TranslateJsonFields::$prefixNameFields ) -> nullable( ) ;
            $table -> unsignedInteger    ( 'created_by'         ) ;
            $table -> foreign            ( 'created_by'         ) -> references( 'id' ) -> on( 'stores'                          ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
            $table -> unsignedBigInteger ( 'products_status_id' ) -> nullable( ) ;
            $table -> foreign            ( 'products_status_id' ) -> references( 'id' ) -> on( 'online_shopping_products_status' ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
            $table -> unsignedBigInteger ( 'category_id'        ) ;
            $table -> foreign            ( 'category_id'        ) -> references( 'id' ) -> on( 'online_shopping_categories'      ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( ) : void {
        $this -> dropIfExists( 'products' );
    }
}
