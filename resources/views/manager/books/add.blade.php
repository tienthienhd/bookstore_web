<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="{{asset('css/select2.css')}}" rel="stylesheet">
	<!-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> -->
</head>
<body>
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<form action="{{route('manager.book.store')}}" method="post" enctype="multipart/form-data">
		@csrf

		{{__('validation.attributes.book.title')}}:
		<input type="text" name="title" value="{{old('title')}}"><br>
		{{__('validation.attributes.book.author')}}:
		<input type="text" name="author" value="{{old('author')}}"><br>
		{{__('validation.attributes.book.category')}}:
		<select name='category'>
			<option value="">{{__('messages.select-a-category')}}</option>
			@foreach ( config('book-category') as $category)
				<option value="{{$category}}"  {{ old('category') == $category ? 'selected' : '' }}>
					{{__('book-category.'.$category)}}
				</option>
			@endforeach
		</select><br>
		{{__('validation.attributes.book.saleprice')}}:
		<input type="number" name="saleprice" value="{{old('saleprice')}}"><br>
		{{__('validation.attributes.book.purchasePrice')}}:
		<input type="number" name="purchasePrice" value="{{old('purchasePrice')}}"><br>
		{{__('validation.attributes.book.state')}}:
		<input type="number" name="state" value="{{old('state')}}"><br>
		{{__('validation.attributes.book.description')}}:
		<textarea rows="4" cols="50" name="description">{{old('description')}}</textarea><br>
		{{__('validation.attributes.book.cover')}}:
		<input type="file" name="cover" accept="image/*"><br>
		<input type="submit" name="addBook" value="{{__('btn.add-book')}}">
	</form>

	<form action="{{route('manager.book.add-quantity')}}" method="post">
		@csrf
		{{__('validation.attributes.book.bookId')}}:
		<select name='bookId' id='bookId' class='form-control select2'>
			@if(isset($books) && count($books)>0)
	            @foreach($books as $book)
	            <option value="{{$book->id}}">{{$book->id.' - '.$book->title}}</option>
	            @endforeach
	        @else
	            <option value="">{{__('messages.no-book-found')}}</option>
	        @endif
    	</select>
        <br>
		{{__('validation.attributes.book.addQuantity')}}:
		<input type="number" name="addQuantity"><br>
		<input type="submit" name="addOldBook" value="{{__('btn.add-book')}}">
	</form>
	<!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/select2.min.js')}}"></script>
	<script type="text/javascript">
		$(function () {
			$('#bookId').select2();
    	});
	</script>
</body>
</html>