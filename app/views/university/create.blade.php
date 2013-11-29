@section('content')
	{{ Form::open(array('route' => 'university.store','method'=>'post')) }}
		@include('university.form')		
	{{ Form::close() }}
@stop