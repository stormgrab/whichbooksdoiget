@section('content')
<ol class="breadcrumb">
	<li><a href={{URL::previous()}}>Back</a></li>
</ol>
	@if(Session::has('books'))
		<?php $total = 0; ?>
		<table class="table">
			<thead class="text-primary">
				<th>Book Name</th>
				<th>Price</th>
				<th></th>
			</thead>
			
			@foreach(Session::get('books') as $book)
				<tr>
					<?php $book = Book::find($book); $total = $total+$book->price?>
					<td>{{$book->name}}</td>
					<td>{{$book->price}}</td>
					<td>
						{{ Form::open(array('route' => array('cart.delete',$book->id),'method'=>'delete')) }}
						    <button type="submit" class="ninjaButton"><span class="glyphicon glyphicon-remove"></span></button>
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach

			<tr>
				<td><strong>Total</strong></td>
				<td><strong>{{$total}}</strong></td>
			</tr>
			
			
		</table>
	@else
	
		<h1>Cart Empty</h1>
	@endif
@stop