@extends('layouts.master')
@section('title','add new Note')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<h3>fill up a new Note/</h3>
				<form method="post" action="/notes">
					@csrf
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" autofocus="on" autocomplete="off" class="form-control">
					</div>
					<div class="form-group">
						<label for="details">Details</label>
						<textarea name="details" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="color">Color</label>
						<input type="text" class="form-control" name="color" autocomplete="off">
					</div>
					<button type="submit" class="btn btn-outline-primary mt-3">Add Note</button>
				</form>
			</div>

		</div>
	</div>

@endsection