<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\studentModel;
use Illuminate\Http\Request;

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
}