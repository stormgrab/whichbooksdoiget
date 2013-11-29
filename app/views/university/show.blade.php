@section('content')
	<p>University Name: {{$university->name}}</p>
	<a href={{route('university.edit',$university->id)}} class="btn btn-default btn-sm">Edit Data</a>
	{{ Form::open(array('route' => array('university.destroy',$university->id),'method'=>'delete')) }}
	    <button type="submit" class="btn btn-danger btn-sm">Delete Data</button>
	{{ Form::close() }}

	<h3>Courses Provided</h3>
	<table class="table">
		@foreach($degrees as $degree)
			<tr>
				<td><a href={{route('degree.show',$degree->id)}}>{{$degree->name }}</a></td>
			</tr>
		@endforeach
	</table>

	<h3>Subjects Taught</h3>
	<table class="table">
		@foreach($subjects as $subject)
			<tr>
				<td><a href={{route('subject.show',$subject->id)}}>{{$subject->name }}</a></td>
			</tr>
		@endforeach
	</table>

	<h3>Books Used</h3>
	<table class="table">
		@foreach($books as $book)
			<tr>
				<td><a href={{route('book.show',$book->id)}}>{{$book->name }}</a></td>
			</tr>
		@endforeach
	</table>
@stop