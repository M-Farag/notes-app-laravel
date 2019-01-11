@extends('layouts.master')
@section('title','MyNotes:Home')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<h3 class="n-header">{{$user->name."'s"}} notes</h3>
				<ul>
					@foreach($notes as $note)
						<li><a href="/notes/{{$note->id}}" >{{$note->title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

@endsection