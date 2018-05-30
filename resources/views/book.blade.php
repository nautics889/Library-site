@extends('layouts.base')

@section('content')
	<div class="book_item">
		<h1>{{$book->title}}</h1>
	</div>
	<div class="comments">
		@guest
		@else
		<form action="{{route('add_comment')}}" method="POST">
			<textarea name="new_comment" id="" cols="30" rows="10"></textarea><br>
			<input type="submit">
			<input type="hidden" id="user" name="user" value="{{Auth::user()['id']}}">
			<input type="hidden" id="book" name="book"  value="{{$book->id}}">
			{{ csrf_field() }}
		</form>
		@endguest
	</div>
@endsection