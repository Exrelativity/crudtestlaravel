<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
        
    public function index(Request $request)
    {
        $data = User::orderBy('users.id', 'desc')->with("products")->paginate(15);
        return response()->json($data, 200);
    }
   

}