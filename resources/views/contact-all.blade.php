<h3>All Contacts</h3>
<table border="1">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Contact</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
@foreach($data as $key=>$val)
	<tr>
		<td>{{$val->first_name}}</td>
		<td>{{$val->email}}</td>
		<td>{{$val->mobile}}</td>
		<td>
			<a href="{{url('contact-delete/'.$val->id)}}">Delete</a>
		</td>
	</tr>
@endforeach

</tbody>
</table>