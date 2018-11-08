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
	<form action="{{route('customer.comment.store')}}" method="post" enctype="multipart/form-data">
		@csrf

		{{__('validation.attributes.comment.title')}}:<br>
		<input type="text" name="title" value="{{old('title')}}"><br>
		
		{{__('validation.attributes.comment.description')}}:<br>
		<textarea rows="4" cols="50" name="description">{{old('description')}}</textarea><br>
		{{__('validation.attributes.comment.star')}}:<br>
		<input type="text" name="star" value="{{old('star')}}"><br>
		
		<input type="hidden" name="book_id" value="{{$book_id}}"><br>



		<input type="submit" name="addComment" value="{{__('btn.add-comment')}}">
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