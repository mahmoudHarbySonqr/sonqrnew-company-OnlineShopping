<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Expression;
use App\Traits\TranslateJsonFields ;

class OnlineShoppingOrderStatus extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'order_status' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> bigIncrements ( 'id'  ) ;
            $table -> string        ( 'key' ) ;
            $table -> timestamps    (       ) ;
            $table -> longText      ( 'name' . TranslateJsonFields::$prefixNameFields ) -> nullable( ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( ) : void {
        $this -> dropIfExists( 'order_status' );
    }
}
