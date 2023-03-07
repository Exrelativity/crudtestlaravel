<?php

namespace App\GraphQL\Queries;

use App\Models\User as UserModel;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class Users
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $users = UserModel::all();
        $response = ["status" => 200, "message"=>"successful", "users"=> $users]; 
        return $response;
    }

}
?>
