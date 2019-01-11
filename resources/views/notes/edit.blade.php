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