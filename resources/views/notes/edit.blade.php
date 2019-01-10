@extends('layouts.master')
@section('title','edit//'.$note->title)

@section('content')
	<div class="container-fluid">
		<h3 class="n-header mb-4">update note:</h3>
		<div class="flex-row">
			<div class="col-4">
				
				<form method="post" action="/notes/{{$note->id}}">
					@csrf
					@method('patch')
					<div class="form-group mb-4">
						<label for="title">Title</label>
						<input type="text" name="title" autofocus="on" autocomplete="off" class="form-control" value="{{$note->title}}">
					</div>
					<div class="form-group mb-4">
						<label for="details">Details</label>
						<textarea name="details" class="form-control">{{$note->details}}</textarea>
					</div>

					<div class="form-group mb-4">
						<label for="color">Color</label>
						<input type="text" class="form-control" name="color" value="{{$note->color}}" autocomplete="off">
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-outline-dark mt-3">Update Note</button>
					</div>
				</form>
			</div>

		</div>
	</div>

@endsection