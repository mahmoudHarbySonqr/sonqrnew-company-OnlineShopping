<?php

namespace App\OnlineShopping\Database\Seeds;

use Illuminate\Database\Seeder;

class OnlineShoppingSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run( ) {
        $this -> call( ProductStatusSeeder :: class );
        $this -> call( OrderStatusSeeder   :: class );
        $this -> call( CategorySeeder      :: class );
    }
}
