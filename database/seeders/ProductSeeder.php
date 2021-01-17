<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
            'name'=> 'This is triall',
            'price'=> '9999',
            'description'=> 'The new flagship is here',
            'category'=> 'Mobile',
            'gallery'=> 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
            ]);
    }
}
