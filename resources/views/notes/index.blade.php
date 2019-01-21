@extends('layouts.master')
@section('title','MyNotes:Home')

@section('content')
	<div class="container-fluid">
		<h3 class="n-header">{{$user->name."'s"}} notes ({{$user->notes->count()}})</h3>
		<div id='example'></div>
		
		@if(session('message'))
		<div id="notificationBox" class="flex-row alert-info mt-3 mb-3">
			<div class="notification-div">{{session('message')}}</div>
		</div>
		@endif
		
		<div class="flex-row">
			<div class="col-6">
				
				<ul>
					@foreach($user->notes as $note)
						<li><a href="/notes/{{$note->id}}" >{{$note->title}}</a> 
							@if($note->hasImage()) 
								{{iconLoader('camera')}}
							@endif
						</li>
						
					@endforeach
				</ul>
			</div>
		</div>
	</div>

@endsection