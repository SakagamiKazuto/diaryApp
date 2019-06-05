	@extends('layouts.layout')
	
	@section('title','トップ')
	
	@section('header')		
	@endsection	
	
	@section('main')
		@if(isset($item->image))
		<img src="http://localhost:8888/diaryapp/storage/app/public/{{$item->image}}">
		@endif
		<h2>タイトル</h2>
		<div class="title">
		{{$item->title}}
		</div>
		<h2>日記</h2>
		<div class="article">
		{{$item->article}}
		</div>
		

	@endsection
	
	@section('footer')
	@endsection