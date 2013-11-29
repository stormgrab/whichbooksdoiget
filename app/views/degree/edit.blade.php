@section('content')
	{{ Form::model($degree,array('route' => array('degree.update',$degree->id),'method'=>'put')) }}
		@include('degree.form')
		
	{{ Form::close() }}
@stop