	@extends('layouts.layout')
	<style>
	.pagination{
		font-size:10pt;
	}
	.pagination li{
		display:inline-block;
	}
	</style>
	@section('title','トップ')
	
	@section('header')
	
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
		
	@endsection	
	
	@section('main')
		<p>ID:名前</p>
		<table>
			<tr><th>No.</th><th>タイトル</th><th>投稿日時</th></tr>
			@foreach($items as $item)
			<tr>
			<td><a href="{{$item->user_id}}/{{$item->id}}">{{$item->id}}</a></td>
			<td><a href="{{$item->user_id}}/{{$item->id}}">{{$item->title}}</a></td>
			<td><a href="{{$item->user_id}}/{{$item->id}}">{{$item->created_at->format('Y年m月d日')}}</a></td>
			</tr>
			@endforeach
		</table>
		{{$items->links()}}
	@endsection
	
	@section('footer')
	@endsection