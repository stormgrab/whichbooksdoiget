@section('content')
	{{ Form::open(array('route' => 'book.store','method'=>'post')) }}
		@include('book.form')
		
	{{ Form::close() }}
@stop