@extends('layouts.master')
@section('title',$note->title)

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<h5>data</h5>
				<h4 class="lead">{{$note->title}}</h4>
				<p style="color:{{$note->color}}" class="blockquote pl-3">
					{{$note->details}}
				</p>
			</div>
			
			@if ($note->hints->count())
			<div class="col-4">
					<h5>assigned hints</h5>
					<ul>
						@foreach($note->hints as $hint)
							<li>{{$hint->body}}</li>
						@endforeach
					</ul>
			</div>
			@endif

			<div class="col-4">
				<h5>options</h5>
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