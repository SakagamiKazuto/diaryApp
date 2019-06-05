	@extends('layouts.layout')
	<style>
	.comment-section{
		display:block;
		width:500px;
		height:auto;
/* 		border:1px solid #000; */
		margin-bottom:10px;
	}
	.comment-section ul{
		list-style-type:none;
	}
	</style>
	@section('title','トップ')
	
	@section('header')		

	@endsection	
	
	@section('main')
		@if(isset($item->image))
		<img src="http://localhost:8888/diaryapp/storage/app/public/{{$item->image}}"height="200"width="200">
		@endif
		<h2>タイトル</h2>
		<div class="title">
		{{$item->title}}
		</div>
		<h2>日記</h2>
		<div class="article">
		{{$item->article}}
		</div>
		<h2>コメント</h2>
		<div class="comment-section">
		<table>
		@foreach($item->comment as $com)
			<tr>
			<td>{{$com->name}}</td>
			<td>{{$com->comment }}</td>
			<td>{{$com->created_at->format('Y年m月d日 H時i分')}}</td>
			</tr>
		@endforeach
		</table>
		</div>
		<form class="comment-form"action="{{$item->id}}"method="post">
		{{csrf_field()}}
		<input type="hidden"name="article_id"value="{{$item->id}}">
		<input type="hidden"name="name"value="{{Auth::user()->name}}">
		<textarea name="comment"rows="5" cols="81"></textarea>
		<br>
		<input type="submit">
		</form>


	@endsection
	
	@section('footer')
	@endsection