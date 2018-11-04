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
	@if(isset($bookcmted))
		
		<table>
			<caption>{{__('word-and-statement.list-comment')}}</caption>
			<thead>
				<tr>
					<th>@sortablelink('id', __('validation.attributes.book.id'))</th>
	    			<th>@sortablelink('title', __('validation.attributes.book.title'))</th>
				</tr>
			</thead>
			<tbody>
				@foreach($bookcmted as $cmt1)
			
					<tr>
					<td>{{$cmt1->id}}</td>
					<td>{{$cmt1->book->title}}</td>
					<td><a href="{{route('customer.commentdetail',['comment_id' => $cmt1->id])}}">{{__('btn.detail')}}</a></td>
					</tr>
			
				@endforeach
				
			</tbody>
		</table>
		
	@endif
</body>
</html>