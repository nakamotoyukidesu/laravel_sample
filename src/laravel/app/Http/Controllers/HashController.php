<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HashController extends Controller
{
    public function index(Request $request){
        $hash = hash_hmac("sha1",$request->message,$request->key,TRUE);
        $signature = base64_encode($hash);
        return view('hash_view',compact('signature'));
    }
}
