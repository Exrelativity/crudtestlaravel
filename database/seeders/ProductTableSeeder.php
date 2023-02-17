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
        $products = [
            array(
                'name' => "name1",
                'description' => 'description1',
                'quantity' => 5,
                'unitPrice' => 10,
                'amountSold' => 5,
                'userId' => 1
            ),
            array(
                'name' => "name2",
                'description' => 'description2',
                'quantity' => 6,
                'unitPrice' => 11,
                'amountSold' => 6,
                'userId' => 1
            ),
            array(
                'name' => "name3",
                'description' => 'description3',
                'quantity' => 10,
                'unitPrice' => 10,
                'amountSold' => 4,
                'userId' => 2
            ),
            array(
                'name' => "name4",
                'description' => 'description4',
                'quantity' => 11,
                'unitPrice' => 17,
                'amountSold' => 4,
                'userId' => 2
            ),
        ];

        // And now, let's create a few articles in our database
        $arrlength = count($products);
        for ($x = 0; $x < $arrlength; $x++) {
            Product::create([
                'name' => $products[$x]['name'],
                'description' => $products[$x]['description'],
                'quantity' => $products[$x]['quantity'],
                'unitPrice' => $products[$x]['unitPrice'],
                'amountSold' => $products[$x]['amountSold'],
                'userId' => $products[$x]['userId']
            ]);
        }
    }
}
