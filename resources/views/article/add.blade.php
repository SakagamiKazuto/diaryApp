	@extends('layouts.layout')
	
	@section('title','トップ')
	
	@section('header')		
	@endsection	
	
	@section('main')
		<a href="add">新規作成</a>
		<form action="add"method="post"enctype="multipart/form-data">
		{{csrf_field() }}
		<input type="hidden"name="user_id"value={{$user->id}}>
		<h2>タイトル</h2>
		<input type="text"name="title"size="40"required>
		<h2>日記</h2>
		<textarea name="article"rows="20"cols="80"required></textarea>
		<h2>画像アップロード</h2>
		<input type="file"name="image">
		<br>
		<input type="submit"value="send">
		</form>
	@endsection
	
	@section('footer')
	@endsection