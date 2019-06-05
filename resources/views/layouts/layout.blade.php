<html>
<head lang="ja">
<meta charset="utf-8">
<title>@yield('title')</title>
</head>
<body>
<div class="header">
@yield('header')
<br><a href="{{url('/user')}}">ユーザー一覧</a>
<h1><a href="{{url('/index')}}">投稿アプリ</a></h1></div>
<main class="main">
@yield('main')
</main>
<div class="footer">
<p>--- Copyright ©︎2018~ diaryapp all rights reserved ---</p>
@yield('footer')
</div>
</body>
</html>