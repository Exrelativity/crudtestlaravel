<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
        
    public function index()
    {
        $data = DB::table('products')->orderBy('id', 'desc')->paginate(15);
        return response()->json($data, 200);
    }
   

    public function show(Request $id)
    {
        $data = collect(Product::where('id', $id)->get());
        return response()->json($data, 200);
    }


    public function store(Request $request)
    {
        if ($request->user()->id == $request->input('userId')){
            Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity'),
                'unitPrice' => $request->input('unitPrice'),
                'amountSold' => $request->input('amountSold'),
                'userId' => $request->input('userId')
            ]);
            
            return response()->json("Saved Sucessfully", 201);
        } else {
            return response()->json("Permission Denied", 500);
        }
       
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->user()->id == $request->input('userId')){
            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity'),
                'unitPrice' => $request->input('unitPrice'),
                'amountSold' => $request->input('amountSold'),
                'userId' => $request->input('userId')
            ]);

            return response()->json(["updated"], 200);
        } else {
            return response()->json("Permission Denied", 500);
        }
    }


    public function delete(Request $request, $id)
    {   
        $product = Product::findOrFail($id);
        if ($request->user()->id == $request->input('userId')){
            $product->delete();
            return response()->json(["deleted"], 204);
        } else {
            return response()->json("Permission Denied", 500);
        }
    }

    public function productByUser(Request $request, $userId){
        $data = collect(User::where('id', $userId)->get()->products);
        return response()->json($data, 200);
    }
}
