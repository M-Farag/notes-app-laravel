<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','MyNotes')</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<style type="text/css">
		
		@import url('https://fonts.googleapis.com/css?family=Abel');
		.jumb-color{
			background-color: #221e32;
			font-family: 'Abel', sans-serif;
			color:#F7F2F7 /*#ECF7F3*/;
		}
		.jumb-hint-color{
			color: #f4d5d3;
		}
		.n-header{
			font-family: 'Abel', sans-serif;
			font-weight: 400;
			font-size: 40px;
			word-spacing: 5px;
			color: #a87081;
		}
		.n-body{
			font-family: 'Abel', sans-serif;
			font-weight: 300;
			font-size: 23px;
			word-spacing: 5px;
			color: #221e32;
		}

		.h-header{
			font-family: 'Abel', sans-serif;
			font-weight: 400;
			font-size: 25px;
			word-spacing: 5px;
			color: #a87081;
		}

		.h-body{
			font-family: 'Abel', sans-serif;
			font-weight: 300;
			font-size: 18px;
			word-spacing: 3px;
			color: #221e32;
		}

		.n-options{
			font-family: 'Abel', sans-serif;
			font-weight: 250;
			font-size: 14px;
			word-spacing: 5px;
			color: #221e32;
		}

		.h-add-btn{
			font-family: 'Abel', sans-serif;
			font-weight: 250;
			font-size: 14px;
			word-spacing: 5px;
			color: #221e32;
		}

		.is-completed{
			text-decoration: line-through;
			color: #7d8b98;
		}
		a:link{
			color: #604962;
		}
		a:visited{
			color: #604962;
		}
		a:hover{
			color: #604962;
		}
		a:active{
			color: #604962;
		}

		.notification-div{
			font-family: 'Abel', sans-serif;
			font-weight: 250;
			font-size: 20px;
			word-spacing: 2px;
			color: #221e32;
		}
	</style>
</head>
<body>
	<div class="jumbotron text-center jumb-color">
		<h1>MyNotes</h1>
		<p>
			+ it <span class="jumb-hint-color">onTheGo</span>.
		</p>
		<small>v2.0</small>
	</div>
	
	@yield('content')
	<hr />	
	<div class="container-fluid mt-4">
		<div class="row">
			<ul>
				<li><a href="/notes">all notes</a></li>
				<li><a href="/notes/create">add a note</a></li>
				<li><a href="/home">dashboard</a></li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>