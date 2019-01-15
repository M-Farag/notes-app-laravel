@extends('layouts.master')
@section('title','MyNotes-Edit: '.$note->title)

@section('content')
	<div class="container-fluid">
		<h3 class="n-header mb-4">update note:</h3>
		<div class="flex-row">
			<div class="col-4">
				
				<form enctype="multipart/form-data" method="post" action="/notes/{{$note->id}}">
					@csrf
					@method('patch')
					<div class="form-group mb-4">
						<label for="title">Title</label>
						<input type="text" name="title" autofocus="on" autocomplete="off" class="form-control {{$errors->has('title')? 'border-danger':''}}" value="{{$note->title}}">
					</div>
					<div class="form-group mb-4">
						<label for="details">Details</label>
						<textarea name="details" class="form-control {{$errors->has('details')? 'border-danger':''}}">{{$note->details}}</textarea>
					</div>

					<div class="form-group mb-4">
						<label for="color">Color</label>
						<input type="text" class="form-control {{$errors->has('color')? 'border-danger':''}}" name="color" value="{{$note->color}}" autocomplete="off">
					</div>
					@if($noteImagePath)
					<div class="form-group">
						<div>
							<label>Current Image</label>
							<img src="{{$noteImagePath}}" class="img-thumbnail">
						</div>
					</div>
					@endif
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file"  class="form-control-file  {{$errors->has('image')?'border-danger':''}}" name="image" autocomplete="off" placeholder="upload Image" value="">
						<small id="imageHelpBlock" class="form-text text-muted">
  						* select a new picture to add or update the old one
						</small>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-outline-dark mt-3">Update Note</button>
					</div>
				</form>
				@if($errors->any())
					<div name="errorMessages" class="alert-danger mt-3 ml-3">
						<h5 class="alert-heading">Errors to fix</h5>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>

		</div>
	</div>

@endsection