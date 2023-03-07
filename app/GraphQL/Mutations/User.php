<?php

namespace App\GraphQL\Mutations;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

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
        $name = $args['name'];
        $email = $args['email'];
        $password = Hash::make($args['password']);
        $email_verified_at = $args['email_verified_at'];

        if (isset($id)){ 
            $response = ["status" => 400, "error"=>"Bad request, Please use UpdateUser Mutation"]; 
        }
        else { 
            UserModel::create( $name, $email, $password, $email_verified_at ); 
            $response = ["status" => 200, "message"=>"successful"]; 
        };

        return $response;
    }
}
?>