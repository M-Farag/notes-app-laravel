@extends('layouts.master')
@section('title',$note->title)

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<h3>Note: {{$note->title}}</h3>
				<h4>Color: {{$note->color}}</h4>
				<p>
					{{$note->details}}
				</p>
			</div>

			<div class="col-4">
				<h3>options</h3>
				<ul>
					<li><a href="/notes/{{$note->id}}/edit" class="btn btn-outline-info mb-2">Edit it</a></li>
					<li><form method="post" action="/notes/{{$note->id}}">
						@method('delete')
						@csrf
						<button class="btn btn-outline-danger">Erase it</button></form></li>
				</ul>
			</div>
		</div>
	</div>

@endsection