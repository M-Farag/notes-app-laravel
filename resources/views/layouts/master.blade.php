<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','My Notes v1.0')</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<style type="text/css">
		.is-completed{
			text-decoration: line-through;
			color: lightgray;
		}
	</style>
</head>
<body>
	<div class="jumbotron text-center">
		<h1>MyNotes</h1>
		<p>
			+ it <mark>onTheGo.</mark>
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