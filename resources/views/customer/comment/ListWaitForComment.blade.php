<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif	
	@if(isset($bookwaitcmt))
		
		<table>
			<caption>{{__('word-and-statement.wait-comment')}} </caption>
			<thead>
				<tr>
					<th>@sortablelink('id', __('validation.attributes.book.id'))</th>
	    			<th>@sortablelink('title', __('validation.attributes.book.title'))</th>
				</tr>
			</thead>
			<tbody>
				@foreach($bookwaitcmt as $cmt1)
			
					<tr>
					<td>{{$cmt1->id}}</td>
					<td>{{$cmt1->book->title}}</td>
					<td><a href="{{route('customer.comment.create',['book_id' => $cmt1->book_id, 'user_id'=> $cmt1->order->user_id])}}" title="">Thêm đánh giá</a></td>
					</tr>
			
				@endforeach
				
			</tbody>
		</table>
		
	@endif
</body>
</html>