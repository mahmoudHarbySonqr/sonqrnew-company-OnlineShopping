<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;

class OnlineShoppingOrders extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'orders' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> bigIncrements      ( 'id'                  )                                                                                                                  ;
            $table -> timestamps         (                       )                                                                                                                  ;
            $table -> string             ( 'address'             ) -> nullable ( ) ;
            $table -> decimal            ( 'latitude'  , 10 , 7  ) -> nullable ( ) ;
            $table -> decimal            ( 'longitude' , 10 , 7  ) -> nullable ( ) ;
            $table -> dateTime           ( 'delivered_at'        ) -> nullable ( ) ;
            $table -> unsignedInteger    ( 'client_id'           )                                                                                                                  ;
            $table -> foreign            ( 'client_id'           ) -> references ( 'id' ) -> on( 'clients'                      ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
            $table -> unsignedBigInteger ( 'order_status_id'     )                                                                                                                  ;
            $table -> foreign            ( 'order_status_id'     ) -> references ( 'id' ) -> on( 'online_shopping_order_status' ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( ) : void {
        $this -> dropIfExists( 'orders' );
    }
}
