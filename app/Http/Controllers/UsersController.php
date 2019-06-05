<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    public function list(Request $request)
    {
    	$user=Auth::user();
    	
    //フォロー済のアカウントを取得する
        $follows=Follow::where('user_id',$user->id)->get();
        $id_followed=array();
        $count=0;
        foreach($follows as $follow)
        {
            $id_followed[$count++]=$follow->id_followed;
        }
        
		$accounts=User::orderBy('id','asc')
		->paginate(6);
    	$param=['user'=>$user,'accounts'=>$accounts,'id_followed'=>$id_followed];	
    	return view('User.list',$param);
    }
    
    public function follow_add($follower,$followed)
    {
    	$follow=new Follow;
    	$ids=[
    	'id_followed'=>$followed,
    	'user_id'=>$follower,
    	];
    	$follow->fill($ids)->save();
    	return redirect('user');
    }
    
        public function follow_remove($follower,$followed)
    {
    	$follow=Follow::where('user_id',$follower)->where('id_followed',$followed)->delete();
    return redirect('user');	
    }
}
