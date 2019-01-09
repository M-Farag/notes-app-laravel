@extends('layouts.master')
@section('title',$note->title)

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-lg-4 mb-4">
				<h5>data</h5>
				<h4 class="lead">{{$note->title}}</h4>
				<p style="color:{{$note->color}}" class="blockquote pl-3">
					{{$note->details}}
				</p>
			</div>
			
			@if ($note->hints->count())
			<div class="col-sm-12 col-lg-4 mb-4">
					<h5>assigned hints</h5>
					
						@foreach($note->hints as $hint)
							<form action="/hints/{{$hint->id}}" method="post">
								@csrf
								@method('PATCH')
								<div class="form-group mb-1 text-monospace {{$hint->completed? 'is-completed':''}}">
									<input type="checkbox" name="completed" onchange="this.form.submit()" {{$hint->completed? 'checked':''}}> {{$hint->body}}
								</div> 
								
							</form>
						@endforeach
					
			</div>
			@endif

			<div class="col-sm-12 col-lg-4 mb-4">
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

		<div class="row mt-5">
			<div class="col-6">
				<h5>add new Hint</h5>
				<form class="form-inline" method="post" action="/notes/{{$note->id}}/hint">
					@csrf
				<div class="form-group">
					<input type="text" name="body" class="form-control form-control-sm mr-3">
					<input type="submit" name="save" value="save" class="btn btn-outline-primary form-control">
				</div>
			</form>
			</div>
		</div>
	</div>

@endsection