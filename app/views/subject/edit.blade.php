@section('content')
	{{ Form::model($subject,array('route' => array('subject.update',$subject->id),'method'=>'put')) }}
		@include('subject.form')		
	{{ Form::close() }}
@stop