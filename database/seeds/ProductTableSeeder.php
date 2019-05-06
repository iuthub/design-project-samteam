<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'imagePath'=> 'https://static.swatch.com/images/product/SUOG709/sa000/SUOG709_sa000_nvz.jpg',
            'title'=> 'Swatch',
            'info'=>'Green Lantern',
            'price'=> 105
        ]);
        $product->save();

        $product = new Product([
            'imagePath'=> 'https://static.swatch.com/images/product/GB312/sa000/GB312_sa000_nvz.jpg',
            'title'=> 'Swatch',
            'info'=>'Sparklenight',
            'price'=> 205
        ]);
        $product->save();

        $product = new Product([
            'imagePath'=> 'https://static.swatch.com/images/product/LR130/sa000/LR130_sa000_nvz.jpg',
            'title'=> 'Swatch',
            'info'=>'Redbelle',
            'price'=> 100
        ]);
        $product->save();
        
        $product = new Product([
            'imagePath'=> 'https://static.swatch.com/images/product/SUOP107/sa000/SUOP107_sa000_nvz.jpg',
            'title'=> 'Swatch',
            'info'=>'Shades of Rose',
            'price'=> 200
        ]);
        $product->save();
        
        $product = new Product([
            'imagePath'=> 'https://static.swatch.com/images/product/SUOP704/sa000/SUOP704_sa000_nvz.jpg',
            'title'=> 'Swatch',
            'info'=>'PinkBayang',
            'price'=> 150
        ]);
        $product->save();

        $product = new Product([
            'imagePath'=> 'https://static.swatch.com/images/product/SUOZ279/sa000/SUOZ279_sa000_nvz.jpg',
            'title'=> 'Swatch',
            'info'=>'Color Dots',
            'price'=> 250
        ]);
        $product->save();

        $product = new Product([
            'imagePath'=> 'https://static.swatch.com/images/product/GE713/sa000/GE713_sa000_nvz.jpg',
            'title'=> 'Swatch',
            'info'=>'Ultra Ciel',
            'price'=> 350
        ]);
        $product->save();
    }
}
