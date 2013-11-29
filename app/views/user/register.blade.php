@extends('main')

@section('content')
		<h1>Register</h1>

	    @if (Session::has('flash_error'))
	        <div id="flash_error">{{ Session::get('flash_error') }}</div>
	    @endif

	    {{ Form::open(array('route'=>'register','method'=>'POST','role'=>'form','class'=>'form-horizontal')) }}

		    <div class="form-group">
		        {{ Form::label('username', 'Username',array('class'=>'col-sm-2 control-label')) }}
		        <div class="col-sm-5">{{ Form::text('username',null,array('class'=>'form-control')) }}</div>
		    </div>

		    <div class="form-group">
		        {{ Form::label('password', 'Password',array('class'=>'col-sm-2 control-label')) }}
		        <div class="col-sm-5">{{ Form::password('password',array('class'=>'form-control')) }}</div>
		    </div>

		    <div class="form-group">
		        {{ Form::label('repeat-password', 'Repeat Password',array('class'=>'col-sm-2 control-label')) }}
		        <div class="col-sm-5">{{ Form::password('repeat-password',array('class'=>'form-control')) }}</div>
		    </div>

		   <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">	
					{{ Form::submit('Register',array('class'=>'btn btn-primary')) }}
				</div>
		   </div>

	    {{ Form::close() }}
@stop
