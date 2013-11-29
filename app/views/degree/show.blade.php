@section('content')
	<p>Degree Name: {{$degree->name}}</p>
	<p>Number of Semesters: {{$degree->semesters}}</p>
	<a href={{route('degree.edit',$degree->id)}} class="btn btn-default btn-sm">Edit Data</a>
	{{ Form::open(array('route' => array('degree.destroy',$degree->id),'method'=>'delete')) }}
	    <button type="submit" class="btn btn-danger btn-sm">Delete Data</button>
	{{ Form::close() }}

	<h3>Universities where taught</h3>
	<table class="table">
		@foreach($universities as $university)
			<tr>
				<td><a href={{route('university.show',$university->id)}}>{{ $university->name }}</a></td>
	
			</tr>
		@endforeach
	</table>

	<h3>Subjects</h3>
	<table class="table">
		@foreach($subjects as $subject)
			<tr>
				<td><a href={{route('subject.show',$subject->id)}}>{{ $subject->name }}</a></td>
	
			</tr>
		@endforeach
	</table>
@stop