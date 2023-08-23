<?php

namespace App\Http\Controllers\Api;

use App\Models\studentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class studentContraller extends Controller
{
    //fetch data
    public function index()
    {
        $students=studentModel::all();
        if ($students ->count() >0){

        return response()->json([ 'status'=> 200,
        'success message'=>$students], 200);
    }
    else {
        return response()->json([ 'status'=> 404,
        'error message'
        =>' No record found!'],404);
    }
}
public function store(Request $request){
$validator = Validator::make($request->all(),[
    'name'=>'required|string|max:191',
    'course'=>'required|string|max:191',
    'email'=>'required|email|max:191',
    'phone'=>'required|digits:10',
]);
if ($validator -> fails()){
   return response() ->json([
    'status'=>422,
    'errors' =>$validator -> messages()
],422);
} else{
    $student =studentModel::create([
        'name' => $request->name,
        'course' => $request->course,
        'email' => $request->email,
        'phone' => $request->phone,
    ]);
    if ($student){
return response()-> json(['status' =>200,
'message' =>'Student created successfuly!'
    ],200);
    }else{
return response() ->json(['status'=>500,
'error' =>"Student is not created!"],500);
    }
}
}
}