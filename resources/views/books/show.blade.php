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
		{{$book->title}}
		{{$book->author}}
		{{__('book-category.'.$book->category)}}
		{{$book->cover}}
		{{$book->description}}
		{{$book->saleprice}}
		{{$star}}
		<a href="#">{{__('btn.add-to-card')}}</a>
		<a href="#">{{__('btn.comment-detail')}}</a>
	@endif
</body>
</html>