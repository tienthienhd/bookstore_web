<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@if(isset($orderStateHistories) && count($orderStateHistories)>0)
		@foreach($orderStateHistories as $orderStateHistory)
			{{$orderStateHistory->description}} ---------- {{$orderStateHistory->created_at}}<br>
		@endforeach
	@else
		{{__('messages.no-data')}}
	@endif
</body>
</html>