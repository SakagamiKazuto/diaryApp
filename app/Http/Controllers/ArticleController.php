<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Comment;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
    	$user=Auth::user();
	    if($user == null) {
	        abort('404');
        }
        
    // 一覧に表示される記事をAraticleモデルからUserのidに基づいて取得し,
    // 記事のidに基づいて順番を並び替えて1ページに4つの記事を表示します
    	$items=Article::where('user_id',$user->id)
    	->orderBy('id','desc')
        ->paginate(4);
    
    	$param=['user'=>$user,'items'=>$items];
    	return view('article.index',$param);
    }
    public function read(Request $request,$article_id)
    {
        $user=Auth::user();
    
    	$item=Article::where('id',$article_id)->first();  	
    
        $param=['user'=>$user,'item'=>$item];
    	return view('article.read',$param);
    }
    
    public function add(Request $request)
    {
        $user=Auth::user();
        
        $param=['user'=>$user];
    	return view('article.add',$param);
    }
   public function create(Request $request)
    {   	
    	$article=new Article;
        $form=$request->all();
        if(isset($form['image']))
        {
           $filePath =$form['image']->store('public');
    // 型をbinaryからStringに置き換えている
           $form['image'] = str_replace('public/', '', $filePath);
        }
    	unset($form['_token']);
    	$article->fill($form)->save();
    	return redirect('index');
    }
    
        public function edit(Request $request,$id)
    {
    	$user=Auth::user();
    	$item=Article::where('id',$id)->first();    	
    	$param=['user'=>$user,'item'=>$item];
    	return view('article.edit',$param);
    }
   public function update(Request $request)
    {   	
    	$article=Article::find($request->id);
        $form=$request->all();
        if(isset($form['image']))
        {
    
           $filePath =$form['image']->store('public');

    //型をbinaryからStringに置き換えている
           $form['image'] = str_replace('public/', '', $filePath);
        }        
        unset($form['_token']);
        $article->fill($form)->save();
        return redirect('index');
    }
    
    public function delete(Request $request,$id)
    {   	
    	Article::find($id)->delete();
        return redirect('index');
    }
    
    public function article_list(Request $request,$user_id)
    {
    	$items=Article::where('user_id',$user_id)
    	->orderBy('id','desc')
    	->paginate(4);
    	$param=['items'=>$items];
    	return view('article.article_list',$param);
    }
    public function article_read(Request $request,$user_id,$article_id)
    {
    	$item=Article::where('id',$article_id)->first();
    	$param=['item'=>$item];
    	return view('article.read',$param);
    }
    public function comment(Request $request,$user_id,$article_id)
    {
    	$comment=new Comment;
    	$form=$request->all();

        
        unset($form['_token']);
    	$comment->fill($form)->save();
        
    //こっから画面にコメントを反映させるための記述をします
    	$item=Article::where('id',$article_id)->first();
    	$param=['item'=>$item];

        return redirect('user/'.$user_id.'/'.$article_id);
    }
    //User_idがなくても大丈夫にするためにほぼ同じ関数を２つ用意しています。
        public function self_comment(Request $request,$article_id)
    {
    	$comment=new Comment;
    	$form=$request->all();

    	unset($form['_token']);
    	$comment->fill($form)->save();
    //こっから画面にコメントを反映させるための記述をします
    	$item=Article::where('id',$article_id)->first();
    	$param=['item'=>$item];

        return redirect('read/'.$article_id);
    }
}
