@section('content')	
	<?php $price = 0; ?>
	@foreach($subjects as $subject)
		@foreach($books as $book)
			@if($book->subject_id == $subject->id)
				@if(!Session::has('getBooks') OR !in_array($book->id, Session::get('getBooks')))
					<?php Session::push('getBooks',$book->id); $price+=$book->price;?>
				@endif
			@endif 
		@endforeach
	@endforeach

	<div class="row">
		<div class="col-md-12">
			<span class="text-danger">Price: <span class="currencyINR">&#8377;</span>{{$book->price}} </span>
			<a class = "btn btn-warning" href={{route('cart.getBooks')}}><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</a>
		</div>
	</div>
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