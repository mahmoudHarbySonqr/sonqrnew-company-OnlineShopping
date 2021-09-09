<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;

class OnlineShoppingOrderProducts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'orders_products' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> integer            ( 'quantity'   ) ;
            $table -> timestamps         (              ) ;
            $table -> unsignedBigInteger ( 'order_id'   ) ;
            $table -> foreign            ( 'order_id'   ) -> references( 'id' ) -> on( 'online_shopping_orders'   ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
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
        $this -> dropIfExists( 'orders_products' );
    }
}
