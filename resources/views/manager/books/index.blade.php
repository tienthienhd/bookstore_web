<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	    @if (isset($errorMessage))
	        <div class="alert alert-danger">
	            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <ul>
	                <li>{{ $errorMessage }}</li>
	            </ul>
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
	    @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif 
	    <a href="{{route('manager.book.create')}}">{{__('btn.add-book')}}</a>

	    <form action="{{route('manager.book.index')}}" method="get">
	    	{{__('validation.attributes.book.id')}}:
	    	<input type="text" name="searchId" value="{{ old('searchId') ?? $searchId ?? ''}}"><br>
	    	{{__('validation.attributes.book.title')}}:
	    	<input type="text" name="searchTitle" value="{{ old('searchTitle') ?? $searchTitle ??''}}"><br>
	    	{{__('validation.attributes.book.author')}}:
	    	<input type="text" name="searchAuthor" value="{{ old('searchAuthor') ?? $searchAuthor ??''}}"><br>
	    	{{__('validation.attributes.book.category')}}:
	    	<select name='searchCategory'>
				<option value="">{{__('messages.select-a-category')}}</option>
				@foreach ( config('book-category') as $category)
					<option value="{{$category}}" {{ old('searchCategory') == $category || (isset($searchCategory) && $searchCategory == $category) ? 'selected' : ''}}>
						{{__('book-category.'.$category)}}
					</option>
				@endforeach
			</select><br>
			<input type="submit" name="search" value="{{__('btn.search')}}">
	    </form>
	    @if(isset($books))
	    	<table>
	    		<thead>
	    			<tr>
	    				<th>@sortablelink('id', __('validation.attributes.book.id'))</th>
	    				<th>@sortablelink('title', __('validation.attributes.book.title'))</th>
	    				<th>@sortablelink('author', __('validation.attributes.book.author'))</th>
	    				<th>@sortablelink('category', __('validation.attributes.book.category'))</th>
	    				<th>@sortablelink('saleprice', __('validation.attributes.book.saleprice'))</th>
	    				<th>@sortablelink('purchase_price', __('validation.attributes.book.purchasePrice'))</th>
	    				<th>@sortablelink('state', __('validation.attributes.book.state'))</th>
	    				<th></th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach($books as $book)
						<tr>
							<td>{{$book->id}}</td>
							<td>{{$book->title}}</td>
							<td>{{$book->author}}</td>
							<td>{{__('book-category.'.$book->category)}}</td>
							<td>{{$book->saleprice}}</td>
							<td>{{$book->purchase_price}}</td>
							<td>{{($book->state < 0) ? '--' : $book->state}}</td>
							<td><a href="{{route('book.show',['bookId' => $book->id])}}">{{__('btn.detail')}}</a></td>
						</tr>
			    	@endforeach
	    		</tbody>
	    	</table>
	    	<div>{{$books->links()}}</div>
	    @endif
	
</body>
</html>