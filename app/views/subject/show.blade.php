@section('content')
	<p>Subject Name: {{$subject->name}}</p>
	<p>Degree: {{$degree->name}}</p>
	<a href={{route('subject.edit',$subject->id)}} class="btn btn-default btn-sm">Edit Data</a>
	{{ Form::open(array('route' => array('subject.destroy',$subject->id),'method'=>'delete')) }}
	    <button type="submit" class="btn btn-danger btn-sm">Delete Data</button>
	{{ Form::close() }}

	<h3>Universities where taught</h3>
	<table class="table">
		@foreach($universities as $university)
			<tr>
				<td><a href={{route('university.show',$university->id)}}>{{$university->name }}</a></td>
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