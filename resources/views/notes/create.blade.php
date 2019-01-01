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
						<input type="text" name="title" autofocus="on" value="{{old('title')}}" autocomplete="off" class="form-control {{$errors->has('title')? 'border-danger':''}}">
					</div>
					<div class="form-group">
						<label for="details">Details</label>
						<textarea name="details" class="form-control {{$errors->has('details')? 'border-danger':''}}">{{old('title')}}</textarea>
					</div>

					<div class="form-group">
						<label for="color">Color</label>
						<input type="text" class="form-control {{$errors->has('color')?'border-danger':''}}" name="color" autocomplete="off" placeholder="red or green or any #FFF code" value="{{old('title')}}">
					</div>
					<button type="submit" class="btn btn-outline-primary mt-3">Add Note</button>
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