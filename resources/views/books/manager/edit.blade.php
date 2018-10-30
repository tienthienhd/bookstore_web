<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
	<form action="{{route('manager.book.update', ['book' => $book])}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('put')

		Tên sách:
		<input type="text" name="title" value="{{$book->title}}"><br>
		Tác giả:
		<input type="text" name="author" value="{{$book->author}}"><br>
		Thể loại:
		<select name='category'>
			<option value="Toán học" selected="selected">Toán học</option>
			<option value="Tiểu thuyết">Tiểu thuyết</option>
			<option value="Kỹ năng sống">Kỹ năng sống</option>
			<option value="Ngoại ngữ">Ngoại ngữ</option>
		</select><br>
		Giá bán ra:
		<input type="number" name="saleprice" value="{{$book->saleprice}}"><br>
		Giá nhập vào:
		<input type="number" name="purchasePrice" value="{{$book->purchase_price}}"><br>
		Mô tả
		<textarea rows="4" cols="50" name="description">{{$book->description}}</textarea><br>
		Ảnh bìa:
		<div id="imgCover" style="background-image: url('{{asset('/img/covers/'.$book->cover)}}');" class="img-thumbnail custom_cover" alt="Cover">
            <div  class="custom_cover_imgae_space" ></div>
            <div class=" row justify-content-center custom_link_upload_cover" >
                <a style="color: white" href="#" onclick="$('#cover').click();">Upload A Cover Picture</a></div>
            <input id="cover" type="file" style="display: none" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="cover" accept="image/*" >

            @if ($errors->has('cover'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cover') }}</strong>
                </span>
            @endif
            
        </div>   
		<input type="submit" name="editBook" value="Edit Book">
	</form>	
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/preview_img.js')}}"></script>
</body>
</html>