@section('content')
	<table class="table">
		@foreach($degrees as $degree)
			<tr>
				<td><a href={{route('degree.show',$degree->id)}}>{{ $degree->name }}</a></td>
			</tr>
		@endforeach
	</table>
	
	<a href={{route('degree.create')}} class="btn btn-primary">New Degree</a>
	
@stop