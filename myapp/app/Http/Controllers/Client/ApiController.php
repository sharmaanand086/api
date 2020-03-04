<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\ClientModel;
 use Validator;
class ApiController extends Controller
{
	 
   public function Client(){
    	return response()->json(ClientModel::get(),200);
    }
    public function ClientById($uniqueid ){        
    	$Client = ClientModel::where('uniqueid',$uniqueid)->first();
    	if(is_null($Client)){
             
    		return response()->json(["message" =>"Record Not Found!"],404);
    	}
    	return response()->json(ClientModel::where('uniqueid',$uniqueid)->firstOrFail(),200);
    }
    public function ClientSave(Request $request){
    	$rules = [  'name'=>'required|min:3',
 					'email'=>'required',
			    	'phone'=>'required',
			    	'uniqueid'=>'unique:clients'
			        ];
    				$Validator = Validator::make($request->all(),$rules);
    				if($Validator->fails()){
    					return response()->json($Validator->errors(),404);
    				}
    	$Client =  ClientModel::create($request->all());
    	return response()->json($Client,201);
    }
    public function ClientUpdate(Request $request,$uniqueid){
    	$Client = ClientModel::where('uniqueid',$uniqueid)->first();
    	if(is_null($Client)){
    		return response()->json(["message" =>"Record Not Found!"],404);
    	}
        
        $Client->fill($request->all())->save();
    	 
    	return response()->json($Client,200);

    }
    public function Clientdelete(Request $request,$uniqueid){
    	$Client = ClientModel::where('uniqueid',$uniqueid)->first();
    	if(is_null($Client)){
    		return response()->json(["message" =>"Record Not Found!"],404);
    	}
    	$uniqueid->delete();
    	return response()->json(["message" =>"Record Deleted!"],200);
    }

    
}
