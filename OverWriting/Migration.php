<?php

namespace App\OnlineShopping\OverWriting;

use Closure;

use Illuminate\Database\Migrations\Migration as MigrationType;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Migration extends MigrationType {

    /**
     * The database schema.
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;

    /**
     * The dataBase name Prefix.
     *
     * @var string
     */
    public static $dataBasePrefix = 'online_shopping_' ;

    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct( ) {
        $this -> schema = Schema::connection( $this -> getConnection( ) );
    }

    /**
     * create Table.
     *
     * @return void
     */
    public function CreateTable( string $name , Closure $callBack ) : void {
        $this -> schema -> create( static::$dataBasePrefix . $name , $callBack );
    }

    /**
     * drop table if Exists .
     *
     * @return void
     */
    public function dropIfExists( string $name ) : void {
        $this -> schema -> dropIfExists( static::$dataBasePrefix . $name );
    }

}
