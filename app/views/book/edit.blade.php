@section('content')
	{{ Form::model($book,array('route' => array('book.update',$book->id),'method'=>'put')) }}
		@include('book.form')		
	
	{{ Form::close() }}
@stop