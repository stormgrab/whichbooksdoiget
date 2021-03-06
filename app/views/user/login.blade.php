@section('content')
	<h1>Login</h1>

	{{ Form::open(array('route'=>'login','method'=>'POST','role'=>'form','class'=>'form-horizontal')) }}

	    <div class="form-group">
	        {{ Form::label('username', 'Username',array('class'=>'col-sm-2 control-label')) }}
	        <div class="col-sm-5">{{ Form::text('username',null,array('class'=>'form-control')) }}</div>
	    </div>

	    <div class="form-group">
	        {{ Form::label('password', 'Password',array('class'=>'col-sm-2 control-label')) }}
	        <div class="col-sm-5">{{ Form::password('password',array('class'=>'form-control')) }}</div>
	    </div>

	   <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">	
				{{ Form::submit('Login',array('class'=>'btn btn-primary')) }}
			</div>
	   </div>

    {{ Form::close() }}
@stop