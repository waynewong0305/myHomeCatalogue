<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'ADDE Chair',
                'description' => 'Color: White',
                'image' => 'https://www.ikea.com/my/en/images/products/adde-chair-white__0728280_pe736170_s5.jpg?f=s',
                'price' => 49,
                'deleted' => 0
            ],
            [
                'name' => 'FLINTAN Office Chair with armrests',
                'description' => 'Color: Black',
                'image' => 'https://www.ikea.com/my/en/images/products/flintan-office-chair-with-armrests-black__1007241_pe825960_s5.jpg?f=s',
                'price' => 299,
                'deleted' => 0
            ],
            [
                'name' => 'VITTSJÖ Laptop table',
                'description' => 'Color: Black-Brown',
                'image' => 'https://www.ikea.com/my/en/images/products/vittsjoe-laptop-table-black-brown-glass__0736023_pe740350_s5.jpg?f=s',
                'price' => 149,
                'deleted' => 0
            ],
            [
                'name' => 'MICKE Desk',
                'description' => 'Color: White',
                'image' => 'https://www.ikea.com/my/en/images/products/micke-desk-white__0736020_pe740347_s5.jpg?f=s',
                'price' => 499,
                'deleted' => 0
            ],
            [
                'name' => 'MULIG Clothes rack',
                'description' => 'Color: White',
                'image' => 'https://www.ikea.com/my/en/images/products/mulig-clothes-rack-white__0710723_pe727744_s5.jpg?f=s',
                'price' => 39,
                'deleted' => 0
            ],
            [
                'name' => 'BOJTEN Shoe rack',
                'description' => 'Color: White',
                'image' => 'https://www.ikea.com/my/en/images/products/bojten-shoe-rack-white__1066422_pe852429_s5.jpg?f=s',
                'price' => 169,
                'deleted' => 0
            ],
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    
    }
}
