<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@if(isset($book))
		{{$book->id}}
		{{$book->title}}
		{{$book->author}}
		{{$book->category}}
		{{$book->cover}}
		{{$book->description}}
		{{$book->saleprice}}
		{{$book->purchase_price}}
		{{$book->state}}
		<a href="{{route('manager.book.edit', ['book' => $book])}}">Edit</a>
		<form action="{{route('manager.book.update.off-state', ['book' => $book])}}" method="post">
			@csrf
			@method('put')
			<input type="submit" name="stopSaleBook" value="Stop Sale Book">
		</form>
	@endif
</body>
</html>