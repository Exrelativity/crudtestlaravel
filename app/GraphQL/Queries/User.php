<?php

namespace App\GraphQL\Queries;

use App\Models\User as UserModel;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class User
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $id = $args['id'];
        $email = $args['email'];
        $searchArg = $id ?? $email;
    
        if (isset($searchArg)) {
            $user = UserModel::find($searchArg);
            $response = ["status" => 200, "message"=>"successful", "user"=> $user]; 
         } else {
            $response = ["status" => 400, "error"=>"Bad request, an id or email is needed for the query"];
        }
        return $response;
    }

   
}

?>
