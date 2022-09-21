<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [array( "sku" => "000001", "name" => "Full coverage insurance", "category" => "insurance", "price" => 89000 ), array( "sku" => "000002", "name" => "Compact Car X3", "category" => "vehicle", "price" => 99000 ), array( "sku" => "000003", "name" => "SUV Vehicle, high end", "category" => "vehicle", "price" => 150000 ), array( "sku" => "000004", "name" => "Basic coverage", "category" => "insurance", "price" => 20000 ), array( "sku" => "000005", "name" => "Convertible X2, Electric", "category" => "vehicle", "price" => 250000 )];
    
        // And now, let's create a few articles in our database
            $arrlength = count($products);
            for($x = 0; $x < $arrlength; $x++) {
            Product::create([
                'sku' => $products[$x]['sku'],
                'name' => $products[$x]['name'],
                'category' => $products[$x]['category'],
                'price' => $products[$x]['price']
            ]);}
    }
    
}
