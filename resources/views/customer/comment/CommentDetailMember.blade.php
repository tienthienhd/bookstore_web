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
	@if(isset($comment))
		@foreach($comment as $cmt1)
		<p>{{$cmt1->book->title}}</p>
		<p>{{$cmt1->id}}.{{$cmt1->user->username}} {{$cmt1->star}}*</p>
		<p>{{$cmt1->title}}</p>
		<p>{{$cmt1->description}}</p>
		<p>{{$cmt1->created_at}}</p>
		@endforeach
		<button type="button"><a href="{{route('customer.comment.edit',['comment' => $cmt1])}}" title="">{{__('btn.edit')}}</a></button>
		<button type="button"><a href="{{route('customer.comment.delete',['comment_id' => $cmt1->id])}}" title="">{{__('btn.delete')}}</a></button>
	@endif

</body>
</html>