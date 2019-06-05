<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
     protected $fillable = [
        'id_followed','user_id',
    ];
	   
	    public function user()
	    {
	    	return $this->belongsTo('App\User');
	    }
	    
		public function getData()
		{
			return '接続::'.$this->id_follower;
		}
}
