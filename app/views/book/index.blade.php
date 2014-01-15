@section('content')
	<table class="table">
		<tr>
			<th>Name</th>
			<th>Author</th>
			<th>Attach University</th>
		</tr>
		@foreach($books as $book)
			<tr>
				<td><a href={{route('book.show',$book->id)}}>{{ $book->name }}</a></td>
				<td>{{$book->author}}</td>

				<td>
					<a href={{route('book.attachUniversity',$book->id)}}>
						<span class="glyphicon glyphicon-link"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</table>
	<a href={{route('book.create')}} class="btn btn-primary">New Book</a>
	
@stop