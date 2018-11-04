<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif	
	@if(isset($book))
		{{$book->title}}
		{{$book->author}}
		{{__('book-category.'.$book->category)}}
		{{$book->cover}}
		{{$book->description}}
		{{__('word-and-statement.price', ['price' => number_format($book->saleprice, 0, '.', '.')])}}
		{{$star}}
		<a href="#">{{__('btn.comment-detail')}}</a>
		<form action="{{route('cart.add')}}" method="post">
			@csrf
			<input type="hidden" name="bookId" value="{{$book->id}}">
			<input type="hidden" name="quantity" value="1">
			<input type="submit" name="addToCart" value="{{__('btn.add-to-card')}}">	
		</form>
	@endif
</body>
</html>