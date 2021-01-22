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
        DB::table('products')->insert([
            [
            'name'=> 'Beautiful Art',
            'price'=> '9999',
            'description'=> 'The new flagship is here',
            'category'=> 'Mobile',
            'gallery'=> 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg',
            ],
            [
                'name'=> 'Samsung S21',
                'price'=> '799',
                'description'=> 'The new flagship is here',
                'category'=> 'Mobile',
                'gallery'=> 'https://media.suara.com/pictures/480x260/2021/01/15/95849-samsung-galaxy-s21.jpg',
            ],
            [
                'name'=> 'Samsung S21 Plus',
                'price'=> '999',
                'description'=> 'The new flagship is here',
                'category'=> 'Mobile',
                'gallery'=> 'https://cdn57.androidauthority.net/wp-content/uploads/2020/12/samsung-galaxy-s21-plus-render-silver-2-705x675.jpg',
            ],
            [
                'name'=> 'Samsung S21 Ultra',
                'price'=> '9999',
                'description'=> 'The new flagship is here',
                'category'=> 'Mobile',
                'gallery'=> 'https://asset.kompas.com/crops/sJcYAI0NYyemSqYkSoAphTGzGvk=/330x0:4650x2880/750x500/data/photo/2020/10/19/5f8d261ff3718.jpg',
            ],
            [
                'name'=> 'Iphone 12',
                'price'=> '899',
                'description'=> 'The new flagship is here',
                'category'=> 'Mobile',
                'gallery'=> 'https://images.macrumors.com/article-new/2019/10/iphone12black.jpg',
            ],
            [
                'name'=> 'Iphone 12 Mini',
                'price'=> '1000',
                'description'=> 'The new flagship is here',
                'category'=> 'Mobile',
                'gallery'=> 'https://images-na.ssl-images-amazon.com/images/I/71sNNCTfMuL._SL1500_.jpg',
            ],
            [
                'name'=> 'Iphone 12 Pro',
                'price'=> '1299',
                'description'=> 'The new flagship is here',
                'category'=> 'Mobile',
                'gallery'=> 'https://d2pa5gi5n2e1an.cloudfront.net/webp/global/images/product/mobilephones/Apple_iPhone_12_Pro/Apple_iPhone_12_Pro_L_2.jpg',
            ],
        ]);
    }
}
