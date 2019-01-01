<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','My Notes v1.0')</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<div class="jumbotron text-center">
		<h1>NotesApp</h1>
		<p>
			add public notes <mark>on-the-go.</mark>
		</p>
	</div>
	
	@yield('content')
	<hr />	
	<div class="container-fluid mt-4">
		<div class="row">
			<ul>
				<li><a href="/notes">Home</a></li>
				<li><a href="/notes/create">add a note</a></li>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>