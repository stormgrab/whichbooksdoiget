@section('content')
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="/whichbooksdoiget/public/thumbnails/{{$book->image}}" height=300 width=225>
		</a>
		<div class="media-body">
			<h3 class="media-heading">{{$book->name}}</h3>
			<p><small>by</small> {{$book->author}}</p>
			<p class="text-danger">Price: <span class="currencyINR">&#8377;</span>{{$book->price}}</p>
			<p>{{$book->desc}}</p>
			<a class = "btn btn-warning" href={{route('cart.create',$book->id)}}><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</a>
		</div>
	</div>
	
@stop