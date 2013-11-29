@section('content')
	<table class="table">
		@foreach($universities as $university)
			
			<tr>
				<td><a href={{route('university.show',$university->id)}}>{{ $university->name }}</a></td>
			

				<td>
					<a href={{route('university.attachDegree',$university->id)}}>
						<span class="glyphicon glyphicon-link"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</table>
	<a href={{route('university.create')}} class="btn btn-primary">New University</a>
	
@stop