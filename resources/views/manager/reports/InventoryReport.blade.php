<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
	Thống kê bán chạy/tồn kho

	
	 @if(isset($sellings) && isset($inventorys))
	
	 	Bán chạy
			<table>
		  <tr>
		    <th>Title</th>
		    <th>Số lượng</th> 
		    
		  </tr>
		  @foreach($sellings as $selling)
			  	<tr>
		    <td>{{$selling->name}}</td>
		    <td>{{$selling->quantity}}</td> 
		    
		  </tr>

			@endforeach
		  
		  
		</table>

		Tồn kho
		<table>
		  <tr>
		    <th>Title</th>
		    <th>Số lượng</th> 
		    
		  </tr>
		  @foreach($inventorys as $inventory)
			  	<tr>
		    <td>{{$inventory->name}}</td>
		    <td>{{$inventory->quantity}}</td> 
		    
		  </tr>

			@endforeach
		  
		  
		</table>
		
	@else
		{{__('messages.no-report-found')}}
	@endif
	


	
</body>
</html>