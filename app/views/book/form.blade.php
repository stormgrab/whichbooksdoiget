	<div>
       {{ Form::label('name', 'Name:') }}
       {{ Form::text('name') }}
   </div>
	<div>
       {{ Form::label('author', 'Author:') }}
       {{ Form::text('author') }}
   </div>
	<div>
       {{ Form::label('desc', 'Description:') }}
       {{ Form::textarea('desc') }}
   </div>
	<div>
	  {{ Form::label('price', 'Price:') }}
	  {{ Form::text('price') }}
	</div>
   <div>
   		{{ Form::label('imgUrl', 'Image:') }}
       	{{ Form::text('imgUrl') }}
   </div>
	
	<select name="subject">
	    @foreach($subjects as $subject)
	    	@unless($subject->name==null)
				<option value={{$subject->id}}>{{$subject->name}}</option>
			@endunless		
	    @endforeach
	</select>
	
   	<div>
		{{ Form::submit() }}
	</div>