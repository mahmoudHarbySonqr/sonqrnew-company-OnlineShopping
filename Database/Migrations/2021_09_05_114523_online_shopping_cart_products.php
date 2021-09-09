<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;

class OnlineShoppingCartProducts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'cart_products' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> integer            ( 'quantity'   ) -> default( 1 ) ;
            $table -> timestamps         (              ) ;
            $table -> unsignedBigInteger ( 'cart_id'    ) ;
            $table -> foreign            ( 'cart_id'    ) -> references( 'id' ) -> on( 'online_shopping_carts'      ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
            $table -> unsignedBigInteger ( 'product_id' ) ;
            $table -> foreign            ( 'product_id' ) -> references( 'id' ) -> on( 'online_shopping_products' ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( ) : void {
        $this -> dropIfExists( 'cart_products' );
    }
}
