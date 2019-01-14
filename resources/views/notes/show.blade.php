@extends('layouts.master')
@section('title','MyNotes: '.$note->title)

@section('content')
	<div class="container-fluid">
		<div class="flex-row">
			<h4 class="lead n-header">{{$note->title}}</h4>
		</div>
		<div class="row">
			<div class="col-sm-12 col-lg-4 mb-4">
				<!-- style="color:{{$note->color}}" -->
				<p  class="pl-3 n-body">
					{{$note->details}}
				</p>
				<img src="{{config('services.images.noteImage').$note->image}}" width="300px" height="300px" />
			</div>
			
			@if ($note->hints->count())
			<div class="col-sm-12 col-lg-4 mb-4">
					@foreach($note->hints as $hint)
							<form action="/hints/{{$hint->id}}" method="post">
								@csrf
								@method('PATCH')
								<div class="form-group h-body mb-1 text-monospace {{$hint->completed? 'is-completed':''}}">
									<input type="checkbox" name="completed" onchange="this.form.submit()" {{$hint->completed? 'checked':''}}> {{$hint->body}}
								</div> 
								
							</form>
						@endforeach
					
			</div>
			@endif

			<div class="col-sm-12 col-lg-4 mb-4">
				<ul>
					<li><a href="/notes/{{$note->id}}/edit" class="btn btn-outline-dark n-options mb-2">Edit it</a></li>
					<li><form method="post" action="/notes/{{$note->id}}">
						@method('delete')
						@csrf
						<button class="btn btn-outline-danger n-options">Erase it</button></form></li>
				</ul>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-6">
				<h5 class="h-header">add new Hint</h5>
				<form class="form-inline" method="post" action="/notes/{{$note->id}}/hint">
					@csrf
				<div class="form-group">
					<input type="text" name="body" class="form-control form-control-sm mr-3" autocomplete="off" autofocus="on">
					<input type="submit" name="save" value="save" class="btn btn-outline-dark h-add-btn btn-sm form-control">
				</div>
			</form>
			</div>
		</div>
	</div>

@endsection