<?php

namespace App\GraphQL\Queries;

use App\Models\Product as ProductModel;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

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
        if (isset($id)) {
            $product = ProductModel::find($id);
            $response = ["status" => 200, "message"=>"successful", "product"=> $product]; 
         } else {
            $response = ["status" => 400, "error"=>"Bad request, an id is needed for the query"];
        }
        return $response;
    }
}
?>