	@extends('layouts.layout')
	
	@section('title','トップ')
	
	@section('header')		
	@endsection	
	
	@section('main')
		<a href="add">新規作成</a>
		<form action="{{$item->id}}"method="post"enctype="multipart/form-data">
		{{csrf_field() }}
		<input type="hidden"name="user_id"value="{{$user->id}}">
		<h2>タイトル</h2>
		<input type="text"name="title"size="40"value="{{$item->title}}"required>
		<h2>日記</h2>
		<textarea name="article"rows="20"cols="80"required>{{$item->article}}</textarea>
		<h2>画像アップロード</h2>
		@if(isset($item->image))

		@endif		
		<input type="file"name="image"value="{{$item->image}}">
		<br>
		<br>
		<input type="submit"value="send">
		</form>
	@endsection
	
	@section('footer')
	@endsection