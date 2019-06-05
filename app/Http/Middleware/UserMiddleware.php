<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=Auth::user();
        $user_id= (Integer)$request->route()->parameter('user_id');
        
        if ($user->id==$user_id) {
            return redirect('index');
        }  
        
        $follow_list=Follow::where('user_id',$user->id)->get();
        
        $list=array();
        $count=0;
        foreach($follow_list as $follow)
        {
            $list[$count++]=$follow->id_followed;
        }
        
        if (!(in_array($user_id,$list))) {
            return redirect('/user/'.$user_id.'/false');
        }

        return $next($request);
    }
}
