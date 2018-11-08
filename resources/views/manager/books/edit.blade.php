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

		{{__('validation.attributes.book.title')}}:
		<input type="text" name="title" value="{{$book->title}}"><br>
		{{__('validation.attributes.book.author')}}:
		<input type="text" name="author" value="{{$book->author}}"><br>
		{{__('validation.attributes.book.category')}}:
		<select name='category'>
			<option value="">{{__('messages.select-a-category')}}</option>
			@foreach ( config('book-category') as $category)
				<option value="{{$category}}"  {{ $book->category == $category ? 'selected' : '' }}>
					{{__('book-category.'.$category)}}
				</option>
			@endforeach
		</select><br>
		{{__('validation.attributes.book.saleprice')}}:
		<input type="number" name="saleprice" value="{{$book->saleprice}}"><br>
		{{__('validation.attributes.book.purchasePrice')}}:
		<input type="number" name="purchasePrice" value="{{$book->purchase_price}}"><br>
		{{__('validation.attributes.book.description')}}:
		<textarea rows="4" cols="50" name="description">{{$book->description}}</textarea><br>
		{{__('validation.attributes.book.cover')}}:
		<div id="imgCover" style="background-image: url('{{asset('/img/covers/'.$book->cover)}}');" class="img-thumbnail custom_cover" alt="Cover">
            <div  class="custom_cover_imgae_space" ></div>
            <div class=" row justify-content-center custom_link_upload_cover" >
                <a style="color: white" href="#" onclick="$('#cover').click();">{{__('btn.upload-cover')}}</a></div>
            <input id="cover" type="file" style="display: none" class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}" name="cover" accept="image/*" >

            @if ($errors->has('cover'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cover') }}</strong>
                </span>
            @endif
            
        </div>   
		<input type="submit" name="editBook" value="{{__('btn.edit')}}">
	</form>	
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/preview_img.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
</body>
</html>