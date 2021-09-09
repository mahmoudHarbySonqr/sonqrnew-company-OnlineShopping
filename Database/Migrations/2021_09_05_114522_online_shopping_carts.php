<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;

class OnlineShoppingCarts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'carts' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> bigIncrements   ( 'id'        ) ;
            $table -> timestamps      (             ) ;
            $table -> unsignedInteger ( 'client_id' ) ;
            $table -> foreign         ( 'client_id' ) -> references( 'id' ) -> on( 'clients' ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( ) : void {
        $this -> dropIfExists( 'carts' );
    }
}
