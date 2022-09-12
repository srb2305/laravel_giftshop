<a href="{{ url('/') }}">Home</a>
<a href="{{ url('about') }}">About</a>
<a href="{{ url('contact') }}">Contact</a>
<a href="{{ url('feedback') }}">Feedback</a>
<a href="{{ url('contact-all') }}">All Contact</a>

<h1>Contact Edit</h1>

<form action="{{url('contact-update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$data->id}}">
	Name : <input type="text" name="name" value="{{ $data->first_name }}"><br>
	Contact: <input type="number" name="number" value="{{ $data->mobile }}"><br>
	<input type="submit" name="submit" value="submit">
	
</form>

