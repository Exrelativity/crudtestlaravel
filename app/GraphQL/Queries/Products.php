<?php

namespace App\GraphQL\Queries;

use App\Models\Product as ProductModel;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
final class Products
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $products = ProductModel::all();
        $response = ["status" => 200, "message"=>"successful", "products"=> $products]; 
        return $response;
    }
}
?>