<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>{{ $title or "e.solomeins' blog" }}</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
	<link rel="stylesheet" href="/css/app.css">
	@section('head')
	@show
</head>
<body>
	<header class="main-header">
		@section('header')
		<div class="main-header__title">e.solomein</div>
		<menu class="main-header__menu">
			<ul class="main-header__items">
				<li class="main-header__item"><a href="/">Главная</a></li>

				<li class="main-header__item"><a href="/contact">Контакты</a></li>
			</ul>
		</menu>
		@show
	</header>

	<main class="main">

		<section class="sidebar">
			@section('sidebar')
			<h3>Левое меню</h3>
			<ul>
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Авторизоваться</a></li>
					<li><a href="{{ url('/register') }}">Зарегистрироваться</a></li>
				@else
					<li><a href="/add">Добавить статью</a></li>
					<li class="dropdown">
						<a href="{{ url('/logout') }}"
	    					onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
   							Выйти
						</a>
						<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				@endif
			</ul>
			@show
		</section>

		<section class="content">
			@if(Session::has('message'))
				<div class="content__messeges">
					{{Session::get('message')}}
				</div>
			@endif
			@section('content')
			@show					
		</section>

	</main>

	<footer class="main-footer">
		@section('footer')
		by <a href="//solomein.ru" target="_blank">e.solomein</a>
		@show		
	</footer>
	<script src="/js/app.js"></script>
</body>
</html>