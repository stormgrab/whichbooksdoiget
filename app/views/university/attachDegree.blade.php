@section('content')
	<p>University Name: {{$university->name}}</p>
	{{ Form::open(array('route' => array('university.attachDegree',$university->id),'method'=>'post')) }}
		<div>
			<select name="degree">
			    @foreach($degrees as $degree)
			    	@unless($degree->name==null)
						<option value={{$degree->id}}>{{$degree->name}}</option>
					@endunless		
			    @endforeach
			</select>
		</div>
		<div>
			{{ Form::submit() }}
		</div>
	{{ Form::close() }}
@stop