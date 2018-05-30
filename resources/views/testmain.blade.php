<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		@guest
            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
	</div>
	<div>
		@foreach($books as $book)
		<p>{{$book->title}}</p>
		@endforeach
	</div>
	@guest
	@else
		<p>{{Auth::user()['role']}}</p>
		<p>Add:</p>
		<form method="POST" action="{{route('add_book')}}">
			Title: <input type="text" name="title" id="title"><br>
			Description: <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
			<input type="submit"><br>
			<input type="hidden" id="role" name="role" value="{{Auth::user()['role']}}">
			{{ csrf_field() }}
		</form>
	@endguest
</body>
</html>