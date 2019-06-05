	@extends('layouts.layout')
	
	@section('title','トップ')
	
	@section('header')		
	@endsection	
	
	@section('main')
		<h2>フォローできてません</h2>
		<a href="{{url('user')}}">戻る</a>
	@endsection
	
	@section('footer')
	@endsection