@section('content')
	<table class="table">
		@foreach($subjects as $subject)
			<tr>
				<td><a href={{route('subject.show',$subject->id)}}>{{ $subject->name }}</a></td>

				<td>
					<a href={{route('subject.attachUniversity',$subject->id)}}>
						<span class="glyphicon glyphicon-link"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</table>
	<a href={{route('subject.create')}} class="btn btn-primary">New Subject</a>
	
@stop