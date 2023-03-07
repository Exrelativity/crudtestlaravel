<?php

namespace App\GraphQL\Mutations;

use App\Models\User as UserModel;

final class UpdateUser
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
        $email = $args['email'];
        $password = $args['password'];
        $email_verified_at = $args['email_verified_at'];
        if (isset($id)) {
            $user = UserModel::find($id);
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->email_verified_at = $email_verified_at;
            $user->save();
            $response = ["status" => 200, "message"=>"successful", "user"=> $user]; 
        } else {
            $response = ["status" => 400, "error"=>"Bad request, Please provide an id for the mutation"]; 
        }
        return $response;

    }
}
?>