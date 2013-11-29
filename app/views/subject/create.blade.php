@section('content')
	{{ Form::open(array('route' => 'subject.store','method'=>'post')) }}
			@include('subject.form')		
	{{ Form::close() }}
@stop