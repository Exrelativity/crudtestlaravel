<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
        
    public function index(Request $request)
    {
        $data = DB::table('users')->orderBy('id', 'desc')->paginate(15);
        return response()->json($data, 200);
    }
   

}