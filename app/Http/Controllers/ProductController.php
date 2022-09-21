<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function finalPrice($request)
    {
        if ($request['category'] == "insurance") {
            $original = $request['price'];
            $final = $request['price'] * 0.3;
            $discount_percentage = "30%";
            $currency = "EUR";
            $priceData = array(
               "original" => $original,
               "final" => $final,
               "discount_percentage" => $discount_percentage,
               "currency" => $currency
            );
        } elseif ($request['sku'] == 3 || $request['sku'] == "000003" ) {
            $original = $request['price'];
            $final = $request['price'] * 0.15;
            $discount_percentage = "15%";
            $currency = "EUR";
            $priceData = array(
               "original" => $original,
               "final" => $final,
               "discount_percentage" => $discount_percentage,
               "currency" => $currency
            );
        } else {
            $original = $request['price'];
            $final = $request['price'];
            $discount_percentage = null;
            $currency = "EUR";
            $priceData = array(
               "original" => $original,
               "final" => $final,
               "discount_percentage" => $discount_percentage,
               "currency" => $currency
            );
        }
        return $priceData;
    }

    
    public function index()
    {
        $data = collect(Product::all())->map(function($data){
                            return array( 
                                'sku' => $data['sku'],
                                'name' => $data['name'],
                                'category' => $data['category'],
                                'price' => $this->finalPrice($data));
                            });
        return response()->json($data);
    }

    public function category(string $category)
    {
        $data = collect(Product::where('category', $category)->get())->map(function($data){
                                                    return array( 
                                                        'sku' => $data['sku'],
                                                        'name' => $data['name'],
                                                        'category' => $data['category'],
                                                        'price' => $this->finalPrice($data));
                                                    });
        return response()->json($data);
    }
 
    public function show(string $sku)
    {
        $data = collect(Product::where('sku', $sku)->get())->map(function($data){
                                                return array( 
                                                    'sku' => $data['sku'],
                                                    'name' => $data['name'],
                                                    'category' => $data['category'],
                                                    'price' => $this->finalPrice($data));
                                                });
        return response()->json($data);
    }

    public function store(Request $request)
    {
        
        Product::create([
            'sku' => $request->input('sku'),
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'price' => $request->input('price')
        ]);
        
        return response()->json("Saved Sucessfully", 201);
    }

    public function update(Request $request, string $sku)
    {
        $product = Product::findOrFail($sku);
        
        $product->update([
            'sku' => $request->input('sku'),
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'price' => $request->input('price')
        ]);

        return response()->json(["updated"], 200);
    }

    public function delete(string $sku)
    {
        $product = Product::findOrFail($sku);
    
        $product->delete();

        return response()->json(["deleted"], 204);
    }
}
