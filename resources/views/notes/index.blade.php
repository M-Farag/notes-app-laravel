@extends('layouts.master')
@section('title','saved Notes')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<h3>notes list/</h3>
				<ul>
					@foreach($notes as $note)
						<li><a href="/notes/{{$note->id}}" >{{$note->title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

@endsection