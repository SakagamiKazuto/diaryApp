	@extends('layouts.layout')
	
	@section('title','トップ')
	
	@section('header')		
	<a href="{{url('login')}}">ログイン</a>
	<a href="{{url('register')}}">会員登録</a>
	@endsection	
	
	@section('main')
		<h2>{{$error_code}}</h2>
	@endsection
	
	@section('footer')
	@endsection