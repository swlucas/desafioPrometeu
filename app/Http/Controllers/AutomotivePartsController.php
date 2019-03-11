<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AutomotiveParts;
use Validator;

class AutomotivePartsController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
    }

    public function getAll(Request $request){
        $automaticParts = AutomotiveParts::all();

        return $automaticParts;
    }
}
