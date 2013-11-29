@section('content')
	{{ Form::model($university,array('route' => array('university.update',$university->id),'method'=>'put')) }}
		@include('university.form')		
	{{ Form::close() }}
@stop