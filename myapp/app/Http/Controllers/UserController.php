<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class UserController extends Controller
{
	public $successStatus = 200;
    public function ClientByemail($email){

    	$url = "https://api.hubapi.com/contacts/v1/contact/email/".$email."/profile?hapikey=050a7606-f202-4c31-9cec-8aeaea345a63"; 
					$ch = curl_init();  
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					curl_setopt($ch, CURLOPT_URL, $url); 
					$result = curl_exec($ch); 
					$manage = json_decode($result);
					$allvalues = get_object_vars($manage);
					
					//var_dump($allvalues['vid']);
					return response()->json(["message" =>$allvalues['vid']],200);
    }
      public function ClientByuniqueid($uniqueid){    		//$withtagid= 1184201;

					$url = "https://api.hubapi.com/contacts/v1/contact/vid/".$uniqueid."/profile?hapikey=050a7606-f202-4c31-9cec-8aeaea345a63"; 
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					curl_setopt($ch, CURLOPT_URL, $url); 
					$result = curl_exec($ch); 
					$results = json_decode($result,True);				    
					    
			         $firstname = array_column($results, "firstname");
			         $email =  array_column($results, "email");
			         $phone =  array_column($results, "phone");   
					 
				    $fname1 =   $firstname[0]['value']; 
				    $email1 =   $email[0]['value']; 
				    $phone1 =   $phone[0]['value']; 
				      			 
                    $ar = array("firstname" =>$fname1,"email"=>$email1, "phone"=>$phone1 );
                    echo json_encode($ar);
					 
				 
    }
     public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function register(Request $request) 
    { 
         $validator = Validator::make($request->all(), [ 
                'name' => 'required', 
                'email' => 'required|email', 
                'password' => 'required', 
                'c_password' => 'required|same:password', 
            ]);
    if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            }
    $input = $request->all(); 
            $input['password'] = bcrypt($input['password']); 
            $user = User::create($input); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
    return response()->json(['success'=>$success], $this-> successStatus); 
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}
