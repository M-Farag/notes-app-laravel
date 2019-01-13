@extends('layouts.master')
@section('title','MyNotes:Home')

@section('content')
	<div class="container-fluid">
		<h3 class="n-header">{{$user->name."'s"}} notes</h3>
		<div id='example'></div>
		@if($user->unreadNotifications)
		<div id="notificationBox" class="flex-row alert-info mt-3 mb-3">
			
			@foreach($user->unreadNotifications as $notification)
				<div class="notification-div">{{$notification['data']['msg']}}</div>
			@endforeach

		</ul>
		</div>
		@endif
		
		<div class="flex-row">
			<div class="col-6">
				
				<ul>
					@foreach($user->notes as $note)
						<li><a href="/notes/{{$note->id}}" >{{$note->title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

@endsection