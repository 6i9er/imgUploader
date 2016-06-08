<?php

//namespace App\Http\Controllers\api;

use Illuminate\Http\Request;


use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ServiceMainCategory;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Directory;

class ImgUploaderController extends Controller
{
    
    public function postList(Request $request)
    {
        
        
       return response()->json("Hello World");
    } 
}
