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
		
		</div>
	</div>
	
@stop