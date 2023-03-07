<?php

namespace App\GraphQL\Mutations;

use App\Models\Product as ProductModel;

final class DeleteProduct
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $id = $args['id'];
        if (isset($id)) {
            $product = ProductModel::find($id);
            $product->delete();
            $response = ["status" => 200, "message"=>"successful"]; 
        } else {
            $response = ["status" => 400, "error"=>"Bad request, Please provide an id for this mutation"]; 
        }
        return $response;
    }
}
?>
