@section('content')
	<p>Subject Name: {{$subject->name}}</p>
	{{ Form::open(array('route' => array('subject.attachUniversity',$subject->id),'method'=>'post')) }}
		<div>
			<select name="university">
				@foreach($universities as $university)
					@unless($university->name==null)
						<option value={{$university->id}}>{{$university->name}}</option>
					@endunless		
				@endforeach
			</select>
		</div>
		<div>
			{{ Form::label('semester', 'Semester:') }}
			{{ Form::text('semester') }}
		</div>
		<div>
			{{ Form::submit() }}
		</div>
	{{ Form::close() }}
@stop