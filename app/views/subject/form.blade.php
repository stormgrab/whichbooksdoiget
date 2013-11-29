<div>
	{{ Form::label('name', 'Name:') }}
	{{ Form::text('name') }}
</div>

<select name="degree">
	@foreach($degrees as $degree)
		@unless($degree->name==null)
			<option value={{$degree->id}}>{{$degree->name}}</option>
		@endunless		
	@endforeach
</select>

<div>
	{{ Form::submit() }}
</div>