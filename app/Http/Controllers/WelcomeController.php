<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barcode;
use Validator;

class WelcomeController extends Controller
{
    public function index()
    {
          return view('frontend');

    }
    public function store(Request $request)
    {
      // if($request->ajax()){ //do some magic here }
      // is_ajax();
      $ajax=$request->ajax();
         if ($ajax == TRUE) {

          $validator =Validator::make($request->all(),
            ['barcode'=>'required|string|max:100']
          );

          if ($validator->fails()) {
            $data['alert'] = 0;
            $data['fails'] = $validator->messages()->all();
            return response()->json($data);
          }
          else {
            $store['barcode'] = $request->barcode;
            $store['status'] = 1;
            $store['created_at'] = \Carbon\Carbon::now();
            Barcode::insert($store);
            $data['alert']=1;

            $data['message']='Data '.$store['barcode'].' berhasil di simpan';
            return response()->json($data);
          }
       }
    }
}
