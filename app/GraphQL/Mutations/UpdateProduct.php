<?php

namespace App\GraphQL\Mutations;

use App\Models\Product as ProductModel;

final class UpdateProduct
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $id = $args['id'];
        $name = $args['name']; 
        $description = $args['description']; 
        $quantity = $args['quantity'];
        $unitPrice = $args['unitPrice'];
        $amountSold = $args['amountSold'];
        $userId = $args['userId'];
        if (isset($id)) {
            $product = ProductModel::find($id);
            $product->name = $name;
            $product->description = $description;
            $product->quantity = $quantity;
            $product->unitPrice = $unitPrice;
            $product->amountSold = $amountSold;
            $product->userId = $userId;
            $product->save();
            $response = ["status" => 200, "message"=>"successful", "product"=> $product]; 
        } else {
            $response = ["status" => 400, "error"=>"Bad request, Please provide an id for the mutation"]; 
        }
        return $response;

    }
}
?>