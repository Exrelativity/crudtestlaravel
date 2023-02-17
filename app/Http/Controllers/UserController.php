<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        
    public function index(Request $request)
    {
        $data = collect(User::all()->orderByDesc('id')->paginate(15));
        return response()->json($data, 200);
    }
   

}