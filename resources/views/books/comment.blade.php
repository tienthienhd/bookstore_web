<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Comment Detail</title>
	<link rel="stylesheet" href="">
</head>
<body>
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif	
	@if(isset($cmt))
		@foreach($cmt as $cmt1)
		<p>{{$cmt1->book->title}}</p>
		<p>{{$cmt1->id}}.{{$cmt1->user->username}} {{$cmt1->star}}*</p>
		<p>{{$cmt1->title}}</p>
		<p>{{$cmt1->description}}</p>
		<p>{{$cmt1->created_at}}</p>
		@endforeach
	@endif
	
</body>
</html>