@section('content')	
	@foreach($subjects as $subject)
		<div class="row">
			<div class="col-md-12">
				<h4>{{$subject->name}}</h4>
							
				@foreach($books as $book)
					@if($book->subject_id == $subject->id)
						<div class="col-md-2">
							<a href = {{route('bookInfo',$book->id)}} >
								<img src="{{constant("PUBLIC").$book->image}}" height=200 width=150/>
							</a>
						</div>

					@endif
				@endforeach
				
				
			</div>
		</div>
	@endforeach

@stop