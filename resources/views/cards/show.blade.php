@extends('layout')
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>{{$card->title}}</h3>
			@foreach($card->notes as $note)
				<div class="panel panel-default">
				  <div class="panel-body">
				    {{$note->body}}
				  </div>
				</div>
			@endforeach
			<hr>
			<h3>Add a New Note</h3>
			<form action="/cards/{{$card->id}}/notes" method="POST">
				<div class="form-group">
					<textarea class="form-control" rows="3" name="body"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">
						Add Note
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection