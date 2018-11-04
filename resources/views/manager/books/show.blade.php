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
	@if(isset($book))
		{{$book->id}}
		{{$book->title}}
		{{$book->author}}
		{{__('book-category.'.$book->category)}}
		{{$book->cover}}
		{{$book->description}}
		{{__('word-and-statement.price', ['price' => number_format($book->saleprice, 0, '.', '.')])}}
		{{__('word-and-statement.price', ['price' => number_format($book->purchase_price, 0, '.', '.')])}}
		{{($book->state < 0) ? '--' : $book->state}}
		<a href="{{route('manager.book.edit', ['book' => $book])}}">{{__('btn.edit')}}</a>
		<form action="{{route('manager.book.update.off-state', ['book' => $book])}}" method="post">
			@csrf
			@method('put')
			@if($book->state < 0)
				<input type="submit" name="stopSaleBook" value="{{__('btn.stop-sale')}}" disabled="disabled">
				<input type="submit" name="reRtopSaleBook" value="{{__('btn.sale-again')}}">
			@else
				<input type="submit" name="stopSaleBook" value="{{__('btn.stop-sale')}}">
			@endif
		</form>
	@endif
</body>
</html>