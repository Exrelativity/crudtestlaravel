<?php

namespace App\GraphQL\Mutations;

use App\Models\Product as ProductModel;

final class Product
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

        if (isset($id)){ 
            $response = ["status" => 400, "error"=>"Bad request, Please use UpdateProduct Mutation"]; 
        }
        else { 
            ProductModel::create( $name, $description, $quantity, $unitPrice, $amountSold, $userId); 
            $response = ["status" => 200, "message"=>"successful"]; 
        };

        return $response;
    }

}
?>