<?php

use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Schema\Blueprint;

class OnlineShoppingProductReviews extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up( ) : void {
        $this -> CreateTable( 'products_reviews' , function( Blueprint $table ){
            $table -> collation = 'utf8mb4_unicode_ci' ;
            $table -> engine    = "InnoDB"             ;
            $table -> bigIncrements     ( 'id'     ) ;
            $table -> integer           ( 'rating' ) -> nullable( ) ;
            $table -> string            ( 'review' ) -> nullable( ) ;
            $table -> timestamps        (          ) ;
            $table -> unsignedBigInteger ( 'created_by'  ) ;
            $table -> foreign            ( 'created_by'  ) -> references( 'id' ) -> on( 'users'                    ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
            $table -> unsignedBigInteger ( 'products_id' ) ;
            $table -> foreign            ( 'products_id' ) -> references( 'id' ) -> on( 'online_shopping_products' ) -> onUpdate( 'cascade' ) -> onDelete( 'cascade' ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( ) : void {
        $this -> dropIfExists( 'products_reviews' );
    }
}
