<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    
     protected $table='clients';
     public $timestamps= false;
    protected $fillable = [
    	'uniqueid',
    	'name',
    	'email',
    	'phone',
    	'scanid',
    	'lunch',
    	'tea',
    	'book',
    	'gala_reg',
        'gala_dinner'
    	 
    ];
}
