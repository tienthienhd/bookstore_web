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
		{{$book->title}}<br>
		{{$book->author}}<br>
		{{__('book-category.'.$book->category)}}<br>
		{{$book->cover}}<br>
		{{$book->description}}<br>
		{{$book->saleprice}}<br>
		{{$star}}<br>
		


		<a href="#">{{__('btn.add-to-card')}}</a><br>


		<a href="{{route('book.comment',['bookId' => $book->id])}}">{{__('btn.comment-detail')}}</a><br>
	@endif
</body>
</html>