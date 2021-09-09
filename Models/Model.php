<?php

namespace App\OnlineShopping\Models;

use DB ;
use Str ;

use App\OnlineShopping\OverWriting\Builder;
use App\OnlineShopping\OverWriting\Migration;
use Illuminate\Database\Eloquent\Model as table;

class Model extends table {

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable( ) : string {
        return $this -> table ?? Migration::$dataBasePrefix . Str::snake( Str::pluralStudly( class_basename( $this ) ) );
    }

    protected function newBaseQueryBuilder( ) : Builder {
        return new Builder(
            $connection = $this -> getConnection    ( ) ,
            $connection         -> getQueryGrammar  ( ) ,
            $connection         -> getPostProcessor ( )
        );
    }
}