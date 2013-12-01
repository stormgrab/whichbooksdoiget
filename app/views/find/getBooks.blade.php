@section('content')	
	<ol class="breadcrumb">
		<li><a href={{route('index')}}>Home</a></li>
		<li><a href={{route('find.university')}}>Select University</a></li>
		<li><a href={{route('find.degree',$university->id)}}>Select Branch</a></li>
		<li><a href={{route('find.semester',array('university'=>$university->id,'degree'=>$degree->id))}}>Select Semester</a></li>
	</ol>
	<?php $price = 0; $getBooks = array(); ?>
	@foreach($subjects as $subject)
		@foreach($books as $book)
			@if($book->subject_id == $subject->id)
				@if(!Session::has('books') OR !in_array($book->id, Session::get('books')))
					<?php array_push($getBooks,$book->id); $price+=$book->price;?>
				@endif
			@endif 
		@endforeach
	@endforeach
	
	<?php Session::flash('getbooks',$getBooks)?>

	<div class="row">
		<div class="col-md-12">
			@if($price!=0)
				<span class="text-danger">Price: <span class="currencyINR">&#8377;</span>{{$price}} </span>
				<a class = "btn btn-warning" href={{route('cart.getBooks')}}><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</a>
			@endif
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