@extends('layouts.master')
@section('title','edit//'.$note->title)

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<h3>Update your Note/</h3>
				<form method="post" action="/notes/{{$note->id}}">
					@csrf
					@method('patch')
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" autofocus="on" autocomplete="off" class="form-control" value="{{$note->title}}">
					</div>
					<div class="form-group">
						<label for="details">Details</label>
						<textarea name="details" class="form-control">{{$note->details}}</textarea>
					</div>

					<div class="form-group">
						<label for="color">Color</label>
						<input type="text" class="form-control" name="color" value="{{$note->color}}" autocomplete="off">
					</div>
					<button type="submit" class="btn btn-outline-primary mt-3">Update Note</button>
				</form>
			</div>

		</div>
	</div>

@endsection