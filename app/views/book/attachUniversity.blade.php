@section('content')
	<p>Subject Name: {{$book->name}}</p>
	{{ Form::open(array('route' => array('book.attachUniversity',$book->id),'method'=>'post')) }}
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
			{{ Form::submit() }}
		</div>
	{{ Form::close() }}
@stop