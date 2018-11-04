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
	    @if(isset($books))
	    	<table>
	    		<thead>
	    			<tr>
	    				<th>@sortablelink('id', 'ID')</th>
	    				<th>@sortablelink('title', 'Title')</th>
	    				<th>@sortablelink('author', 'Author')</th>
	    				<th>@sortablelink('category', 'Category')</th>
	    				<th>@sortablelink('saleprice', 'Saleprice')</th>
	    				<th>@sortablelink('purchase_price', 'Purchase price')</th>
	    				<th>@sortablelink('state', 'State')</th>
	    				<th></th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach($books as $book)
						<tr>
							<td>{{$book->id}}</td>
							<td>{{$book->title}}</td>
							<td>{{$book->author}}</td>
							<td>{{$book->category}}</td>
							<td>{{$book->saleprice}}</td>
							<td>{{$book->purchase_price}}</td>
							<td>{{$book->state}}</td>
							<td><a href="{{route('book.show',['bookId' => $book->id])}}">Detail</a></td>
						</tr>
			    	@endforeach
	    		</tbody>
	    	</table>
	    	<div>{{$books->links()}}</div>
	    @endif
	
</body>
</html>