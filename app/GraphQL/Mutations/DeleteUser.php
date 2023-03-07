<?php

namespace App\GraphQL\Mutations;

use App\Models\User as UserModel;

final class DeleteUser
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
            $user = UserModel::find($id);
            $user->delete();
            $response = ["status" => 200, "message"=>"successful"]; 
        } else {
            $response = ["status" => 400, "error"=>"Bad request, Please provide an id for this mutation"]; 
        }
        return $response;
    }
}
?>