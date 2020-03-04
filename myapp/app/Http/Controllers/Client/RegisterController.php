<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\GetclientModel;
 use App\ClientModel;
 use Validator;
class RegisterController extends Controller
{

public function ScanQRcode($uniqueid){

		if(is_numeric($uniqueid)){
			  $Client = GetclientModel::where('uniqueid',$uniqueid)->first();
			  if(is_null($Client)){
             
    		return response()->json(["message" =>"Record Not Found!"],202);
    	}
    	return response()->json(GetclientModel::where('uniqueid',$uniqueid)->firstOrFail(),200);
		}else{

	    $Client = GetclientModel::where('email',$uniqueid)->first();
	    if(is_null($Client)){
             
    		return response()->json(["message" =>"Record Not Found!"],202);
    	}
    	return response()->json(GetclientModel::where('email',$uniqueid)->firstOrFail(),200);
	}
    	
}
 
public function Scanforidcard(Request $request,$uniqueid){
			 	$Client = GetclientModel::where('uniqueid',$uniqueid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}else{   
		    	 	 // return response()->json($Client,201);

    				$input = $request->all();    			 
    				$input['name'] =$Client['name'];
    				$input['phone'] =$Client['phone'];
    				$input['email'] =$Client['email'];
    				$input['uniqueid'] =$Client['uniqueid'];
    				$input['scanid'] =$request->input('scanid');
    				// return response()->json($input,201);
    				$creatednew = ClientModel::where('uniqueid',$uniqueid)->first();					 
    				if($creatednew['uniqueid'] == $input['uniqueid']){
    					$message = ['message'=>'User Already registerd'];     				 
    				   return response()->json($message,202);
    			}else{
    				$creatednew = ClientModel::create($input);
    				$success= GetclientModel::where('uniqueid', $uniqueid)->update(array('scanid' =>$input['scanid']));    				 
    				return response()->json(['message'=>'Successfully created user'],201);
    			}					 
    				
		    	}  
    				
}
public function lostidcard(Request $request,$uniqueid){
			  $Client = GetclientModel::where('uniqueid',$uniqueid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}   	
		    	$Client->fill($request->all())->save();      			 
    			$scanid = $Client['scanid'];    			 
    			ClientModel::where('uniqueid', $uniqueid)->update(array('scanid' => $scanid));
    				return response()->json($Client,201);
}

public function scanforLunchandtea(Request $request,$scanid){
		 $Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $lunch_tea = $Clientckeck['lunch_tea'];
			if($lunch_tea == 1){
				$Client = ClientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	$bal_Lunch = $Client['lunch'];
		    	$bal_Tea = $Client['tea'];
				$used;
		    	if($bal_Lunch==0 && $bal_Tea==0){
				 $used = array("lunch"=>"1 Left","Tea"=>"2 Left");

		    	}
		    	if($bal_Lunch==1 && $bal_Tea==1){
				 $used = array("lunch"=>"1 Used","Tea"=>"1 Used , 1 Left");
		    	}	    	 
		    	 
		    	if($bal_Tea==2){
				 $used = array("Tea"=>"All Used ");
		    	}
		    	 
		   		return response()->json($used ,201);
			}else{
					return response()->json(["message" =>"Not Allowed For Lunch & Tea"],202);
			}
			 

}

public function OnsubmitLunchTea(Request $request,$scanid){
	 $Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $lunch_tea = $Clientckeck['lunch_tea'];
			if($lunch_tea == 1){
 			$Client = ClientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	//$bal_Lunch = $Client['lunch'];
		    	//$bal_Tea = $Client['tea'];
				  // return response()->json($Client ,201);
		    	if($Client['lunch']=='0' && $Client['tea']=='0'){
			 	$scanid = $Client['scanid'];    			 
    			ClientModel::where('scanid', $scanid)->update(array('tea' => '1'));
				  $used = array("Tea"=>"1 Time Updated ");
				  return response()->json($used ,201);
				  
		    	} if($Client['lunch']=='0' && $Client['tea']=='1'){
				 $scanid = $Client['scanid']; 
				 $l1='1';   			 
    			  ClientModel::where('scanid', $scanid)->update(array('lunch' => $l1));
    			 $used = array("Lunch"=>"Lunch Updated ");
    			   return response()->json($used ,201);
				  
		    	} if($Client['lunch']=='1' && $Client['tea']=='1'){
			 	$scanid = $Client['scanid'];  
			 	$t2 = '2';  			 
    			  ClientModel::where('scanid', $scanid)->update(array('tea' => $t2));
				  $used = array("Tea"=>"2 Time Updated ");
				    return response()->json($used ,201);
				   
		    	} if ($Client['lunch']=='1' && $Client['tea']=='2') {		     			 
    			 
				  $used = array("Lunch"=>"All Used","Tea"=>"All Used");
				    return response()->json($used ,201);
				  
		    	}
		    	}else{
					return response()->json(["message" =>"Check with admin to update L & T"],202);
			}
		    	 
		   		
}
public function scanforBooks(Request $request,$scanid){
	 $Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $book = $Clientckeck['book'];
			if($book == 1){
	 			$Client = ClientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	$bal_book = $Client['book'];
		        //return response()->json($Client ,201);
				$used;
		    	if($bal_book==0 ){
				 $used = array("book"=>"Remaining BOTH");

		    	}
		    	if($bal_book==1){
				 $used = array("book"=>"Remaining YCYW");
		    	}	    	 
		    	 
		    	if($bal_book==2){
				 $used = array("book"=>"Remaining SMB");
		    	}	
		    	if($bal_book==3){
				 $used = array("book"=>"No Remaining Book");
		    	}		    	 
		   		return response()->json($used ,201);
		   		}else{
					return response()->json(["message" =>"Not Allowed to get Book"],202);
			}
}
public function Onsubmitbook(Request $request,$scanid){
	 $Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $book = $Clientckeck['book'];
			if($book == 1){
 			$Client = ClientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	 $name = $request->input('submitbtn');
		    	if($name == 'SMB'){		        
			 	$scanid = $Client['scanid'];    			 
    			ClientModel::where('scanid', $scanid)->update(array('book' => '1'));
				  $used = array("SMB"=>"SMB book Updated ");
				  return response()->json($used ,201);
				  
		    	} if($name =='YCYW'){
				 $scanid = $Client['scanid']; 				   			 
    			  ClientModel::where('scanid', $scanid)->update(array('book' =>'2'));
    			 $used = array("YCYW"=>"YCYW book Updated ");
    			   return response()->json($used ,201);
				  
		    	} if($name =='BOTH'){
			 	$scanid = $Client['scanid']; 
			 	 			 
    			  ClientModel::where('scanid', $scanid)->update(array('book' => '3'));
				  $used = array("BOTH"=>"BOTH book Updated ");
				    return response()->json($used ,201);
				  }  
		    }else{
					return response()->json(["message" =>"Check with admin to update book"],202);
			}
 			}

 			public function scanforgalanight(Request $request,$scanid){
 		$Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $gala_reg = $Clientckeck['gala_reg'];
			if($gala_reg == 1){
			 $Client = GetclientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	
		      //  return response()->json($Client ,201);
		        $gala_reg = $Client['gala_reg'];
				$used;
		    	if($gala_reg==0 ){
				 $used = array("GalaNight"=>"Not Register for Galanight");

		    	}
		    	if($gala_reg==1){
				 $used = array("Galanight"=>"Yes Register for Galanight");
		    	}
		    	return response()->json($used ,201);
		    	 }else{
					return response()->json(["message" =>"You are not allowed for G-night"],202);
			}
	}
public function submitforgalanight(Request $request,$scanid){
	$Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $gala_reg = $Clientckeck['gala_reg'];
			if($gala_reg == 1){
			$Client = ClientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	 $name = $request->input('submitbtn');
		    	if($name == 'YES'){		        
			 	$scanid = $Client['scanid'];    			 
    			ClientModel::where('scanid', $scanid)->update(array('gala_reg' => '1'));
				  $used = array("galanight"=>"Attended galanight");
				  return response()->json($used ,201);
				  
		    	} 
		    	}else{
					return response()->json(["message" =>"Check with admin to update G-night"],202);
			}
}
public function scanforgaladinner(Request $request,$scanid){
		$Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $gala_dinner = $Clientckeck['gala_dinner'];
			if($gala_dinner == 1){
			 $Client = GetclientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	
		      //  return response()->json($Client ,201);
		        $gala_dinner = $Client['gala_dinner'];
				$used;
		    	if($gala_dinner==0 ){
				 $used = array("Gala Dinner"=>"Not Register for Gala Dinner");

		    	}
		    	if($gala_dinner==1){
				 $used = array("Gala Dinner"=>"Yes Register for Gala Dinner");
		    	}
		    	return response()->json($used ,201);
		     }else{
					return response()->json(["message" =>"You are not allowed for G-dinner"],202);
			}
	}
public function submitforgaladinner(Request $request,$scanid){
			$Clientckeck = GetclientModel::where('scanid',$scanid)->first();
			if(is_null($Clientckeck)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
			 $gala_dinner = $Clientckeck['gala_dinner'];
			if($gala_dinner == 1){
			$Client = ClientModel::where('scanid',$scanid)->first();
		    	if(is_null($Client)){
		             
		    		return response()->json(["message" =>"Record Not Found!"],202);
		    	}  
		    	 $name = $request->input('submitbtn');
		    	if($name == 'YES'){		        
			 	$scanid = $Client['scanid'];    			 
    			ClientModel::where('scanid', $scanid)->update(array('gala_dinner' => '1'));
				  $used = array("galadinner"=>"Attended dinner");
				  return response()->json($used ,201);
				  
		    	} 
		    	}else{
					return response()->json(["message" =>"Check with admin to update G-dinner"],202);
			}
}

}//end class
