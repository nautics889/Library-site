@extends('layouts.base')

@section('content')
	<div id="list_wrapper">
		<span class="kind">Ancient literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'ancient')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">Middle Ages literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'middle')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">Renaissance literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'renaissance')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">New literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'new')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>
					</p>
				@endif
			@endforeach
		</div>
		<span class="kind">Newest literature</span><hr>
		<div class="kind_item">
			@foreach($books as $book)
				@if($book->kind == 'newest')
					<p class="list_item">
						<a href="{{ route('item', $book->id) }}" id="navbarDropdown"><span class="book_title">«{{$book->title}}»</span><i> — {{$book->author}}</i></a>
					</p>
				@endif
			@endforeach
		</div>
	@guest
	@else
		@if(Auth::user()['role']=='admin')
			<p>Add:</p>
			<form method="POST" action="{{route('add_book')}}">
				<p>Title:</p><input type="text" name="title" id="title"><br>
				<p>Description:</p><textarea name="description" id="description" cols="30" rows="10"></textarea><br>
				<select name="select_type" id="select_type">
					<option value="art">Art</option>
					<option value="scientific">Scientific</option>
				</select>
				<select name="select_kind" id="select_kind">
					<option value="ancient">Ancient</option>
					<option value="middle">Middle</option>
					<option value="renaissance">Renaissance</option>
					<option value="new">New</option>
					<option value="newest">Newest</option>
				</select>
				<p>Author:</p><input type="text" name="author" id="author">
				<p>Price:</p><input type="number" step="any" name="price" id="price">
				<p>Amount in stock:</p><input type="nubmer" name="instock" id="instock">
				<p>Image:</p><input type="file" id="picrel" name="picrel">
				<input type="submit"><br>
				<input type="hidden" id="role" name="role" value="{{Auth::user()['role']}}">
				{{ csrf_field() }}
			</form>
		@endif
	@endguest
	</div>
@endsection