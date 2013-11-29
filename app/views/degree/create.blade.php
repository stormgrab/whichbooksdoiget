@section('content')
	{{ Form::open(array('route' => 'degree.store','method'=>'post')) }}
			@include('degree.form')
		
	{{ Form::close() }}
@stop