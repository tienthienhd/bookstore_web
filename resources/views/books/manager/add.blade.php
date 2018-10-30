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

		Tên sách:
		<input type="text" name="title"><br>
		Tác giả:
		<input type="text" name="author"><br>
		Thể loại:
		<select name='category'>
			<option value="Toán học" selected="selected">Toán học</option>
			<option value="Tiểu thuyết">Tiểu thuyết</option>
			<option value="Kỹ năng sống">Kỹ năng sống</option>
			<option value="Ngoại ngữ">Ngoại ngữ</option>
		</select><br>
		Giá bán ra:
		<input type="number" name="saleprice"><br>
		Giá nhập vào:
		<input type="number" name="purchasePrice"><br>
		Trạng thái:
		<input type="number" name="state"><br>
		Mô tả
		<textarea rows="4" cols="50" name="description"></textarea><br>
		Ảnh bìa:
		<input type="file" name="cover" accept="image/*"><br>
		<input type="submit" name="addBook" value="Add Book">
	</form>

	<form action="{{route('manager.book.add-quantity')}}" method="post">
		@csrf
		Cuốn sách muốn nhập:
		<select name='bookId' id='bookId' class='form-control select2'>
			@if(isset($books) && count($books)>0)
	            @foreach($books as $book)
	            <option value="{{$book->id}}">{{$book->id.' - '.$book->title}}</option>
	            @endforeach
	        @else
	            <option value="0">No book found</option>
	        @endif
    	</select>
        <br>
		Nhập thêm:
		<input type="number" name="addQuantity"><br>
		<input type="submit" name="addOldBook" value="Add Old Book">
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