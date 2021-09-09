<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Traits\TranslateJsonFields ;

class OnlineShoppingCategories extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'categories' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> bigIncrements ( 'id'   ) ;
            $table -> timestamps    (        ) ;
            $table -> integer       ( 'sort' ) -> nullable( ) ;
            $table -> longText      ( 'name'        . TranslateJsonFields::$prefixNameFields ) -> nullable( ) ;
            $table -> longText      ( 'description' . TranslateJsonFields::$prefixNameFields ) -> nullable( ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( ) : void {
        $this -> dropIfExists( 'categories' );
    }

}
