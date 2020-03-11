<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetclientModel extends Model
{
    
     protected $table='maintable';
     public $timestamps= false;
    protected $fillable = [
    	'uniqueid',
    	'name',
    	'email',
    	'phone', 
        'scanid',  	 
    	'lunch_tea',    	 
    	'book',
    	'gala_reg',
    	'gala_dinner'
    ];
}
