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

					{{$user->id}}::{{$user->name}}

		<table>
			<tr><th>ID</th><th>名前</th><th>フォロー</th></tr>
			@foreach($accounts as $account)

			<tr>
			<td><a href="user/{{$account->id}}">{{$account->id}}</a></td>
			<td><a href="user/{{$account->id}}">{{$account->name}}</a></td>
			@if($account->id!=$user->id)
			@if(!(in_array($account->id,$id_followed)))
			<td><a href="user/add/{{$user->id}}&{{$account->id}}">フォロー</a></td>
			@else
			<td><a href="user/remove/{{$user->id}}&{{$account->id}}">解除</a></td>
			@endif
			@endif
			</tr>
			
			@endforeach
		</table>
		{{$accounts->links()}}
	@endsection
	
	@section('footer')
	@endsection