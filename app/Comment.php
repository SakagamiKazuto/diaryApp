<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded=array('id');
	
	public function article()
	{
		return $this->belongsTo('App\Article');
	}
	public function getComment()
	{
		return $this->comment;
	}
}
